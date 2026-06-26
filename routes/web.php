<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('area/create',[AreaController::class,'create']);
Route::post('area/store',[AreaController::class,'store'])->name('area.store');
//
Route::get('trainingCenter/create',[TrainingCenterController::class,'create']);
Route::post('trainingCenter/store',[TrainingCenterController::class,'store'])->name('trainingCenter.store');
// //
 Route::get('computer/create',[ComputerController::class,'create']);
Route::post('computer/store',[ComputerController::class,'store'])->name('computer.store');
// //
Route::get('teacher/create',[App\Http\Controllers\TeacherController::class,'create']);
Route::post('teacher/store',[App\Http\Controllers\TeacherController::class,'store'])->name('teacher.store');
// //
Route::get('course/create',[App\Http\Controllers\CourseController::class,'create']);
Route::post('course/store',[App\Http\Controllers\CourseController::class,'store'])->name('course.store');
// //
Route::get('apprentice/create',[App\Http\Controllers\ApprenticeController::class,'create']);
Route::post('apprentice/store',[App\Http\Controllers\ApprenticeController::class,'store'])->name('apprentice.store');



