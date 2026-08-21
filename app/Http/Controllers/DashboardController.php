<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\TrainingCenterController; // Ajusta según el nombre de tu modelo (ej. TrainingCenter o Training_center)
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Apprentice;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Consultas directas a BD para evitar fallos de nombres de Modelos
        $areaCount = DB::table('areas')->count();
        $trainingCenterCount = DB::table('training_centers')->count(); 
        $computerCount = DB::table('computers')->count();
        $teacherCount = DB::table('teachers')->count();
        $courseCount = DB::table('courses')->count();
        $apprenticeCount = DB::table('apprentices')->count();

        return view('dashboard', compact(
            'areaCount',
            'trainingCenterCount',
            'computerCount',
            'teacherCount',
            'courseCount',
            'apprenticeCount'
        ));
    }
}