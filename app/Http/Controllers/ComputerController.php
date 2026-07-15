<?php

namespace App\Http\Controllers;

use App\Models\computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index(){
        $computers = computer::all();
        return view('Computer.index', compact('computers'));
    }

    public function create(){
        return view('Computer.create');
    }

    public function store (Request $request){
        $validated = $request->validate([
            'number' => 'required|integer',
            'brand' => 'required|string|max:255',
        ]);

        computer::create($validated);

        return redirect()->route('computer.index')->with('success', 'Computador creado correctamente.');
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

        return redirect()->route('computer.index')->with('success', 'Computador actualizado correctamente.');
    }

    public function destroy(computer $computer){
        $computer->delete();

        return redirect()->route('computer.index')->with('success', 'Computador eliminado correctamente.');
    }
}
