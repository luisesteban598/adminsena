<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        // Ordeno primero las noticias más recientes para facilitar la administración.
        $news = News::latest()->get();

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

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'Noticia creada correctamente.');
    }

    public function show(News $news)
    {
        return view('News.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('News.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $this->validateNews($request);
        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published']
            ? ($news->published_at ?? now())
            : null;

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Noticia eliminada correctamente.');
    }

    private function validateNews(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    }
}
