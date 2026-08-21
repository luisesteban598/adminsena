<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area;

class AreaController extends Controller
{
    public function index(){
        $areas = area::all();
        return view('Area.index', compact('areas'));
    }

    public function create(){
        return view('Area.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        area::create($validated);

        return redirect()->route('area.index')->with('success', 'Área creada correctamente.');
    }

    public function edit(area $area){
        return view('Area.edit', compact('area'));
    }

    public function update(Request $request, area $area){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area->update($validated);

        return redirect()->route('area.index')->with('success', 'Área actualizada correctamente.');
    }

    public function destroy(area $area){
        $area->delete();

        return redirect()->route('area.index')->with('success', 'Área eliminada correctamente.');
    }
}