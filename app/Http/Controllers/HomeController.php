<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\computer;
use App\Models\training_center;

class HomeController extends Controller
{
    // Muestra la página principal
    public function index()
    {
        // Comprobamos si el usuario ya inició sesión
        if (auth()->check()) {
            // Si ya inició sesión, lo enviamos al dashboard
            return redirect()->route('dashboard');
        }

        // Si no ha iniciado sesión, mostramos el home
        return view('home');
    }

    // Muestra el dashboard con las estadísticas
    public function dashboard()
    {
        // Contamos todas las áreas registradas
        $areaCount = area::count();

        // Contamos todos los centros de formación registrados
        $trainingCenterCount = training_center::count();

        // Contamos todos los computadores registrados
        $computerCount = computer::count();

        // Enviamos las estadísticas a la vista dashboard
        return view('dashboard', [
            'areaCount' => $areaCount,
            'trainingCenterCount' => $trainingCenterCount,
            'computerCount' => $computerCount,
        ]);
    }
}