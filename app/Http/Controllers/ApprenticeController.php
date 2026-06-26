<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\computer;
use App\Models\course;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function create(){
        $computers = computer::all();
        $courses = course::all();

        return view('apprentices.create', compact('computers','courses'));
    }

    public function store(Request $request){
        $apprentices = Apprentice::create($request->all());

        return $apprentices;
    }
}