<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area;

class AreaController extends Controller
{
    public function create()
    {
        return view('Area.create');
    }

    public function store(Request $request)
    {
        $area = new Area();
        $area->name = $request->name;
        $area->save();

        return $area;
    }
}
