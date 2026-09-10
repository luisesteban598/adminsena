<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\computer;
use App\Models\training_center;
use App\Models\News;

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
        // Solo publico en el home las noticias que el administrador marcó como publicadas.
        $news = News::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('news'));
    }

    public function showNews(News $news)
    {
        abort_unless($news->is_published, 404);

        return view('News.public-show', compact('news'));
    }

    public function newsIndex()
    {
        // Muestro únicamente noticias publicadas en la sección pública.
        $news = News::where('is_published', true)
            ->latest('published_at')
            ->get();

        return view('News.public-index', compact('news'));
    }

    public function contact()
    {
        return view('contact');
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