<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Teacher;
use App\Models\Training_center;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function create(){
        $areas = Area::all();
        $training_centers = Training_center::all();

        return view('teacher.create', compact('areas','training_centers'));
    }

    public function store(Request $request){
        $teacher = Teacher::create($request->all());

        return $teacher;
    }
}