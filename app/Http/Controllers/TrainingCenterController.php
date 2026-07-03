<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training_center;

class TrainingCenterController extends Controller

{
       public function index(){

        $trainingCenters=Training_center::all();

        return view('trainingcenter.index',compact('trainingCenters'));


    }
    public function create(){
        return view ('trainingcenter.create');
    }

    public function store (Request $request){

        $trainingcenter = Training_center::create($request->all());
        return $trainingcenter;
    }
}