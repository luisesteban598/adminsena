<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\course;
use App\Models\Training_center;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = course::all();

        if ($this->isApiRequest($request)) {
            return response()->json($courses->load(['area', 'trainingCenter', 'teachers', 'apprentices']));
        }

        return view('Course.index', compact('courses'));
    }

    public function create(){
        $training_centers = Training_center::all();
        $areas = Area::all();

        return view('Course.create', compact('training_centers','areas'));
    }

    // Muestro el curso con el área, centro e instructores asociados.
    public function show(course $course){
        $course->load(['area', 'trainingCenter', 'teachers', 'apprentices']);

        if (request()->is('v1/*')) {
            return response()->json($course);
        }

        return view('Course.show', compact('course'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'course_number' => 'required|integer',
            'day' => 'required|date',
            'training_center_id' => 'nullable|exists:training_centers,id',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        $course = course::create($validated);

        if ($this->isApiRequest($request)) {
            $course->load(['area', 'trainingCenter', 'teachers', 'apprentices']);

            return response()->json(['message' => 'Curso creado correctamente.', 'course' => $course], 201);
        }

        return redirect()->route('course.index')->with('success', 'Curso creado correctamente.');
    }

    public function edit(course $course){
        $training_centers = Training_center::all();
        $areas = Area::all();

        return view('Course.edit', compact('course','training_centers','areas'));
    }

    public function update(Request $request, course $course){
        $validated = $request->validate([
            'course_number' => $request->isMethod('patch') ? 'sometimes|required|string|max:255' : 'required|integer',
            'day' => $request->isMethod('patch') ? 'sometimes|required|date' : 'required|date',
            'training_center_id' => $request->isMethod('patch') ? 'sometimes|nullable|exists:training_centers,id' : 'nullable|exists:training_centers,id',
            'area_id' => $request->isMethod('patch') ? 'sometimes|nullable|exists:areas,id' : 'nullable|exists:areas,id',
        ]);

        $course->update($validated);

        if ($this->isApiRequest($request)) {
            return response()->json([
                'message' => 'Curso actualizado correctamente.',
                'course' => $course->fresh(['area', 'trainingCenter', 'teachers', 'apprentices']),
            ]);
        }

        return redirect()->route('course.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Request $request, course $course){
        $course->delete();

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Curso eliminado correctamente.']);
        }

        return redirect()->route('course.index')->with('success', 'Curso eliminado correctamente.');
    }
}