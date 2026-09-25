<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseTeacherController extends Controller
{
    public function index(course $course)
    {
        return response()->json($course->teachers()->get());
    }

    public function sync(Request $request, course $course)
    {
        $validated = $request->validate([
            'teacher_ids' => 'present|array',
            'teacher_ids.*' => 'integer|exists:teachers,id',
        ]);

        $course->teachers()->sync($validated['teacher_ids']);

        return response()->json([
            'message' => 'Instructores del curso actualizados correctamente.',
            'teachers' => $course->teachers()->get(),
        ]);
    }
}
