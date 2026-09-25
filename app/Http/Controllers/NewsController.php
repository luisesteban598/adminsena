<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // Ordeno primero las noticias más recientes para facilitar la administración.
        $news = News::latest()->get();

        if ($this->isApiRequest($request)) {
            return response()->json($news);
        }

        return view('News.index', compact('news'));
    }

    public function create()
    {
        return view('News.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateNews($request);
        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        // Guardo la imagen en el disco público solo si el usuario adjuntó una.
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news = News::create($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Noticia creada correctamente.', 'news' => $news], 201);
        }

        return redirect()->route('news.index')->with('success', 'Noticia creada correctamente.');
    }

    public function show(News $news)
    {
        if (request()->is('v1/*')) {
            return response()->json($news);
        }

        return view('News.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('News.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $this->validateNews($request, $request->isMethod('patch'));
        $partial = $request->isMethod('patch');
        if (!$partial || $request->exists('is_published')) {
            $validated['is_published'] = $request->boolean('is_published');
            $validated['published_at'] = $validated['is_published']
                ? ($news->published_at ?? now())
                : null;
        }

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Noticia actualizada correctamente.', 'news' => $news->fresh()]);
        }

        return redirect()->route('news.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(Request $request, News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Noticia eliminada correctamente.']);
        }

        return redirect()->route('news.index')->with('success', 'Noticia eliminada correctamente.');
    }

    private function validateNews(Request $request, bool $partial = false): array
    {
        $required = $partial ? 'sometimes|required|' : 'required|';

        return $request->validate([
            'title' => $required.'string|max:255',
            'summary' => $required.'string|max:500',
            'content' => $required.'string',
            'image' => $partial ? 'sometimes|nullable|image|mimes:jpg,jpeg,png,webp|max:2048' : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => $partial ? 'sometimes|boolean' : 'sometimes|boolean',
        ]);
    }
}
