<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    //
    public function create()
    {
        return view('trainingCenter.create');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
