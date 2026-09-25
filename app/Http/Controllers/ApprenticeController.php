<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\computer;
use App\Models\course;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index(Request $request){
        $apprentices = Apprentice::all();

        if ($this->isApiRequest($request)) {
            return response()->json($apprentices->load(['course', 'computer']));
        }

        return view('Apprentices.index', compact('apprentices'));
    }

    public function create(){
        $computers = computer::all();
        $courses = course::all();

        return view('Apprentices.create', compact('computers','courses'));
    }

    // Muestro el aprendiz con el curso y computador que tiene asignados.
    public function show(Apprentice $apprentice){
        $apprentice->load(['course', 'computer']);

        if (request()->is('v1/*')) {
            return response()->json($apprentice);
        }

        return view('Apprentices.show', compact('apprentice'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:50',
            'course_id' => 'nullable|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]);

        $apprentice = Apprentice::create($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Aprendiz creado correctamente.', 'apprentice' => $apprentice], 201);
        }

        return redirect()->route('apprentice.index')->with('success', 'Aprendiz creado correctamente.');
    }

    public function edit(Apprentice $apprentice){
        $computers = computer::all();
        $courses = course::all();

        return view('Apprentices.edit', compact('apprentice','computers','courses'));
    }

    public function update(Request $request, Apprentice $apprentice){
        $validated = $request->validate([
            'name' => $request->isMethod('patch') ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'email' => $request->isMethod('patch') ? 'sometimes|required|email|max:255' : 'required|email|max:255',
            'cell_number' => $request->isMethod('patch') ? 'sometimes|required|string|max:50' : 'required|string|max:50',
            'course_id' => $request->isMethod('patch') ? 'sometimes|nullable|exists:courses,id' : 'nullable|exists:courses,id',
            'computer_id' => $request->isMethod('patch') ? 'sometimes|nullable|exists:computers,id' : 'nullable|exists:computers,id',
        ]);

        $apprentice->update($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Aprendiz actualizado correctamente.', 'apprentice' => $apprentice->fresh()]);
        }

        return redirect()->route('apprentice.index')->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(Request $request, Apprentice $apprentice){
        $apprentice->delete();

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Aprendiz eliminado correctamente.']);
        }

        return redirect()->route('apprentice.index')->with('success', 'Aprendiz eliminado correctamente.');
    }
}