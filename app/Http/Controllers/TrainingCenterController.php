<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training_center;

class TrainingCenterController extends Controller

{
       public function index(){

        $trainingCenters=Training_center::all();

        return view('TrainingCenter.index',compact('trainingCenters'));


    }
    public function create(){
        return view('TrainingCenter.create');
    }

    public function store (Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Training_center::create($validated);

        return redirect()->route('trainingCenter.index')
            ->with('success', 'Centro de formación creado correctamente.');
    }

    public function edit(Training_center $trainingCenter){
        return view('TrainingCenter.edit', compact('trainingCenter'));
    }

    public function update(Request $request, Training_center $trainingCenter){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $trainingCenter->update($validated);

        return redirect()->route('trainingCenter.index')
            ->with('success', 'Centro de formación actualizado correctamente.');
    }

    public function destroy(Training_center $trainingCenter){
        $trainingCenter->delete();

        return redirect()->route('trainingCenter.index')
            ->with('success', 'Centro de formación eliminado correctamente.');
    }
}