<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\course;
use App\Models\Training_center;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = course::all();
        return view('Course.index', compact('courses'));
    }

    public function create(){
        $training_centers = Training_center::all();
        $areas = Area::all();

        return view('Course.create', compact('training_centers','areas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'course_number' => 'required|integer',
            'day' => 'required|date',
            'training_center_id' => 'nullable|exists:training_centers,id',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        course::create($validated);

        return redirect()->route('course.index')->with('success', 'Curso creado correctamente.');
    }

    public function edit(course $course){
        $training_centers = Training_center::all();
        $areas = Area::all();

        return view('Course.edit', compact('course','training_centers','areas'));
    }

    public function update(Request $request, course $course){
        $validated = $request->validate([
            'course_number' => 'required|integer',
            'day' => 'required|date',
            'training_center_id' => 'nullable|exists:training_centers,id',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        $course->update($validated);

        return redirect()->route('course.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(course $course){
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Curso eliminado correctamente.');
    }
}