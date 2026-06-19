<?php

namespace App\Http\Controllers;
use App\Models\computer;

use Illuminate\Http\Request;

class ComputerController extends Controller
{
      public function create(){
        return view ('computer.create');
    }

    public function store (Request $request){

        $Computer = Computer::create($request->all());
        return $Computer;
    }
}
