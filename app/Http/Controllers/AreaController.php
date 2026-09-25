<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area;

class AreaController extends Controller
{
    public function index(){
        $areas = area::all();
        return response()->json($areas);
    }

    public function create(){
        return view('Area.create');
    }

    // Muestro la información del área y sus relaciones sin permitir modificaciones.
    public function show(area $area){
        $area->load(['courses', 'teachers']);

        if (request()->is('v1/*')) {
            return response()->json($area);
        }

        return view('Area.show', compact('area'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = area::create($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Área creada correctamente.', 'area' => $area], 201);
        }

        return redirect()->route('area.index')->with('success', 'Área creada correctamente.');
    }

    public function edit(area $area){
        return view('Area.edit', compact('area'));
    }

    public function update(Request $request, area $area){
        $validated = $request->validate([
            'name' => $request->isMethod('patch') ? 'sometimes|required|string|max:255' : 'required|string|max:255',
        ]);

        $area->update($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Área actualizada correctamente.', 'area' => $area->fresh()]);
        }

        return redirect()->route('area.index')->with('success', 'Área actualizada correctamente.');
    }

    public function destroy(Request $request, area $area){
        $area->delete();

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Área eliminada correctamente.']);
        }

        return redirect()->route('area.index')->with('success', 'Área eliminada correctamente.');
    }
}