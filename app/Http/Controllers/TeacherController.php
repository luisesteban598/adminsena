<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Teacher;
use App\Models\Training_center;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('Teacher.index', compact('teachers'));
    }

    public function create(){
        $areas = Area::all();
        $training_centers = Training_center::all();

        return view('Teacher.create', compact('areas','training_centers'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        Teacher::create($validated);

        return redirect()->route('teacher.index')->with('success', 'Instructor creado correctamente.');
    }

    public function edit(Teacher $teacher){
        $areas = Area::all();
        $training_centers = Training_center::all();

        return view('Teacher.edit', compact('teacher','areas','training_centers'));
    }

    public function update(Request $request, Teacher $teacher){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $teacher->update($validated);

        return redirect()->route('teacher.index')->with('success', 'Instructor actualizado correctamente.');
    }

    public function destroy(Teacher $teacher){
        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'Instructor eliminado correctamente.');
    }
}