<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\computer;
use App\Models\course;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index(){
        $apprentices = Apprentice::all();
        return view('Apprentices.index', compact('apprentices'));
    }

    public function create(){
        $computers = computer::all();
        $courses = course::all();

        return view('Apprentices.create', compact('computers','courses'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:50',
            'course_id' => 'nullable|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]);

        Apprentice::create($validated);

        return redirect()->route('apprentice.index')->with('success', 'Aprendiz creado correctamente.');
    }

    public function edit(Apprentice $apprentice){
        $computers = computer::all();
        $courses = course::all();

        return view('Apprentices.edit', compact('apprentice','computers','courses'));
    }

    public function update(Request $request, Apprentice $apprentice){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:50',
            'course_id' => 'nullable|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]);

        $apprentice->update($validated);

        return redirect()->route('apprentice.index')->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(Apprentice $apprentice){
        $apprentice->delete();

        return redirect()->route('apprentice.index')->with('success', 'Aprendiz eliminado correctamente.');
    }
}