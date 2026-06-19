<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function create(){

        $area=Area::all();
        $trainingCenter=TrainingCenter::all();
        return view('course.create',compact('area','trainingCenter'));

    }

    public function store(Request $request){

     Course::create($request->all());
        return $request;



    }
     
}
