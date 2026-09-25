<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing pública / Inicio
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/noticias', [HomeController::class, 'newsIndex'])->name('news.public.index');
Route::get('/noticias/{news}', [HomeController::class, 'showNews'])->name('news.public.show');
Route::get('/contacto', [HomeController::class, 'contact'])->name('contact');

// ==========================================
// Rutas de Autenticación (Públicas / Invitados)
// ==========================================
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    // Registro
    Route::get('/registro', [AuthController::class, 'showRegister'])->name('registro.index');
    Route::post('/registro', [AuthController::class, 'register'])->name('registro.store');
});

// Cerrar sesión (solo si ya inició sesión)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ==========================================
// Panel Interno (Requiere Inicio de Sesión)
// ==========================================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Noticias institucionales
    Route::get('news/list', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/show/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/delete/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Áreas
    Route::get('area/list', [AreaController::class, 'index'])->name('area.index');
    Route::get('area/create', [AreaController::class, 'create'])->name('area.create');
    Route::post('area/store', [AreaController::class, 'store'])->name('area.store');
    Route::get('area/show/{area}', [AreaController::class, 'show'])->name('area.show');
    Route::get('area/edit/{area}', [AreaController::class, 'edit'])->name('area.edit');
    Route::put('area/update/{area}', [AreaController::class, 'update'])->name('area.update');
    Route::delete('area/delete/{area}', [AreaController::class, 'destroy'])->name('area.destroy');

    // Centros de formación
    Route::get('trainingCenter/list', [TrainingCenterController::class, 'index'])->name('trainingCenter.index');
    Route::get('trainingCenter/create', [TrainingCenterController::class, 'create'])->name('trainingCenter.create');
    Route::post('trainingCenter/store', [TrainingCenterController::class, 'store'])->name('trainingCenter.store');
    Route::get('trainingCenter/show/{trainingCenter}', [TrainingCenterController::class, 'show'])->name('trainingCenter.show');
    Route::get('trainingCenter/edit/{trainingCenter}', [TrainingCenterController::class, 'edit'])->name('trainingCenter.edit');
    Route::put('trainingCenter/update/{trainingCenter}', [TrainingCenterController::class, 'update'])->name('trainingCenter.update');
    Route::delete('trainingCenter/delete/{trainingCenter}', [TrainingCenterController::class, 'destroy'])->name('trainingCenter.destroy');

    // // Computadores
    // Route::get('computer/list', [ComputerController::class, 'index'])->name('computer.index');
    // Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');
    // Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');
    // Route::get('computer/show/{computer}', [ComputerController::class, 'show'])->name('computer.show');
    // Route::get('computer/edit/{computer}', [ComputerController::class, 'edit'])->name('computer.edit');
    // Route::put('computer/update/{computer}', [ComputerController::class, 'update'])->name('computer.update');
    // Route::delete('computer/delete/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');

    // Instructores
    Route::get('teacher/list', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('teacher/show/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
    Route::get('teacher/edit/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('teacher/update/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('teacher/delete/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

    // Cursos
    Route::get('course/list', [CourseController::class, 'index'])->name('course.index');
    Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('course/show/{course}', [CourseController::class, 'show'])->name('course.show');
    Route::get('course/edit/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('course/update/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('course/delete/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

    // Aprendices
    Route::get('apprentice/list', [ApprenticeController::class, 'index'])->name('apprentice.index');
    Route::get('apprentice/create', [ApprenticeController::class, 'create'])->name('apprentice.create');
    Route::post('apprentice/store', [ApprenticeController::class, 'store'])->name('apprentice.store');
    Route::get('apprentice/show/{apprentice}', [ApprenticeController::class, 'show'])->name('apprentice.show');
    Route::get('apprentice/edit/{apprentice}', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
    Route::put('apprentice/update/{apprentice}', [ApprenticeController::class, 'update'])->name('apprentice.update');
    Route::delete('apprentice/delete/{apprentice}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

});