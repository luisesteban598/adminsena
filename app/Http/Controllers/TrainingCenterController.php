<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\training_center;
use Cloudinary\Cloudinary;

class TrainingCenterController extends Controller
{
    //public function index(){

    //$areas=Area::all();
    //{

    //return view('area.index',compact('areas'));

    //}
    //}

    public function index()
    {
        $trainingCenters = training_center::all();
        return response()->json($trainingCenters, 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:training_centers,name',
            'location' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $file = $request->file('imagen');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'training_centers',
                'resource_type' => 'image',
            ]
        );

        $trainingCenter = training_center::create([
            'name' => $request->name,
            'location' => $request->location,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json([
            'message' => 'Centro de entrenamiento creado correctamente',
            'data' => $trainingCenter,
        ], 201);
    }

    public function show (int $id)
    {
     $trainingCenter = training_center::findOrFail($id);
       return response()->json($trainingCenter, 200);

    }

    public function update(Request $request, int $id)
    {
        $trainingCenter = training_center::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:training_centers,name,' . $trainingCenter->id,
            'location' => 'required|string|max:255',
        ]);

        $trainingCenter->update($validated);

        return response()->json([
            'message' => 'Centro de entrenamiento actualizado correctamente',
            'trainingCenter' => $trainingCenter
        ], 200);
      }


    public function destroy(int $id)
    {
        $trainingCenter = training_center::findOrFail($id);
        $trainingCenter->delete();

        return response()->json([
            'message' => 'Centro de entrenamiento eliminado correctamente'
        ], 200);
    }
}