<?php

namespace App\Http\Controllers;

use App\Models\computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index(){
        $computers = computer::all();
         return response()->json($computers);
    }

    // public function create(){
    //     return view('Computer.create');
    // }

    // // Muestro el equipo y el aprendiz asignado, si existe.
    // public function show(computer $computer){
    //     $computer->load('apprentice');

    //     return view('Computer.show', compact('computer'));
    // }

    public function store (Request $request){
        $validated = $request->validate([
            'number' => 'required|integer',
            'brand' => 'required|string|max:255',
        ]);

        $computer = computer::create($validated);

        return response()->json([
            'message' => 'Computador creado correctamente.',
            'computer' => $computer,
        ], 201);
    }

    public function edit(computer $computer){
        return view('Computer.edit', compact('computer'));
    }

    public function update(Request $request, computer $computer){
        $validated = $request->validate([
            'number' => 'required|integer',
            'brand' => 'required|string|max:255',
        ]);

        $computer->update($validated);

        return response()->json([
            'message' => 'Computador actualizado correctamente.',
            'computer' => $computer->fresh(),
        ]);
    }

    public function destroy(computer $computer){
        $computer->delete();

        return response()->json(['message' => 'Computador eliminado correctamente.']);
    }
}
