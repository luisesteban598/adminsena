<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing pública (redirige a /dashboard si ya hay sesión iniciada)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Autenticación
Route::get('login', [AuthController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'store'])->name('login.store')->middleware('guest');
Route::post('logout', [AuthController::class, 'destroy'])->name('logout')->middleware('auth');

// Panel interno (requiere sesión iniciada)
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('area/create', [AreaController::class, 'create'])->name('area.create');
    Route::post('area/store', [AreaController::class, 'store'])->name('area.store');

    Route::get('trainingCenter/create', [TrainingCenterController::class, 'create'])->name('trainingCenter.create');
    Route::post('trainingCenter/store', [TrainingCenterController::class, 'store'])->name('trainingCenter.store');

    Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');
    Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');
});
