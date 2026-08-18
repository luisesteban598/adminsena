<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\computer;
use App\Models\training_center;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'areaCount' => Area::count(),
            'trainingCenterCount' => Training_center::count(),
            'computerCount' => Computer::count(),
        ]);
    }
}
