<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Teacher;
use App\Models\Training_center;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = Teacher::all();

        if ($this->isApiRequest($request)) {
            return response()->json($teachers->load(['area', 'training_center', 'courses']));
        }

        return view('Teacher.index', compact('teachers'));
    }

    public function create(){
        $areas = Area::all();
        $training_centers = Training_center::all();

        return view('Teacher.create', compact('areas','training_centers'));
    }

    // Muestro el instructor con su área y centro de formación.
    public function show(Teacher $teacher){
        $teacher->load(['area', 'training_center', 'courses']);

        if (request()->is('v1/*')) {
            return response()->json($teacher);
        }

        return view('Teacher.show', compact('teacher'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $teacher = Teacher::create($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Instructor creado correctamente.', 'teacher' => $teacher], 201);
        }

        return redirect()->route('teacher.index')->with('success', 'Instructor creado correctamente.');
    }

    public function edit(Teacher $teacher){
        $areas = Area::all();
        $training_centers = Training_center::all();

        return view('Teacher.edit', compact('teacher','areas','training_centers'));
    }

    public function update(Request $request, Teacher $teacher){
        $validated = $request->validate([
            'name' => $request->isMethod('patch') ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'email' => $request->isMethod('patch') ? 'sometimes|required|email|max:255' : 'required|email|max:255',
            'area_id' => $request->isMethod('patch') ? 'sometimes|nullable|exists:areas,id' : 'nullable|exists:areas,id',
            'training_center_id' => $request->isMethod('patch') ? 'sometimes|nullable|exists:training_centers,id' : 'nullable|exists:training_centers,id',
        ]);

        $teacher->update($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Instructor actualizado correctamente.', 'teacher' => $teacher->fresh()]);
        }

        return redirect()->route('teacher.index')->with('success', 'Instructor actualizado correctamente.');
    }

    public function destroy(Request $request, Teacher $teacher){
        $teacher->delete();

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Instructor eliminado correctamente.']);
        }

        return redirect()->route('teacher.index')->with('success', 'Instructor eliminado correctamente.');
    }
}