<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\course;
use App\Models\Training_center;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(){
        $training_centers = Training_center::all();
        $areas = Area::all();

        return view('course.create', compact('training_centers','areas'));
    }

    public function store(Request $request){
        $Course = course::create($request->all());

        return $Course;
    }
}