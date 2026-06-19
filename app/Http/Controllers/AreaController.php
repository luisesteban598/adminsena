<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area;

class AreaController extends Controller
{
     public function create(){

        return view('area.create');

    }

    public function store(Request $request){

     
        $Area = Area::create($request->all());
        return $Area;
    }
}