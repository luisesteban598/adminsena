<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training_center;

class TrainingCenterController extends Controller

{
       public function index(Request $request){

        $trainingCenters=Training_center::all();

        if ($this->isApiRequest($request)) {
            return response()->json($trainingCenters->load(['course', 'teacher']));
        }

        return view('TrainingCenter.index',compact('trainingCenters'));


    }
    public function create(){
        return view('TrainingCenter.create');
    }

    // Muestro el centro y sus relaciones principales sin exponer identificadores técnicos.
    public function show(Training_center $trainingCenter){
        $trainingCenter->load(['course', 'teacher']);

        if (request()->is('v1/*')) {
            return response()->json($trainingCenter);
        }

        return view('TrainingCenter.show', compact('trainingCenter'));
    }

    public function store (Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $trainingCenter = Training_center::create($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Centro creado correctamente.', 'training_center' => $trainingCenter], 201);
        }

        return redirect()->route('trainingCenter.index')
            ->with('success', 'Centro de formación creado correctamente.');
    }

    public function edit(Training_center $trainingCenter){
        return view('TrainingCenter.edit', compact('trainingCenter'));
    }

    public function update(Request $request, Training_center $trainingCenter){
        $validated = $request->validate([
            'name' => $request->isMethod('patch') ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'location' => $request->isMethod('patch') ? 'sometimes|required|string|max:255' : 'required|string|max:255',
        ]);

        $trainingCenter->update($validated);

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Centro actualizado correctamente.', 'training_center' => $trainingCenter->fresh()]);
        }

        return redirect()->route('trainingCenter.index')
            ->with('success', 'Centro de formación actualizado correctamente.');
    }

    public function destroy(Request $request, Training_center $trainingCenter){
        $trainingCenter->delete();

        if ($this->isApiRequest($request)) {
            return response()->json(['message' => 'Centro eliminado correctamente.']);
        }

        return redirect()->route('trainingCenter.index')
            ->with('success', 'Centro de formación eliminado correctamente.');
    }
}