<?php

use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider under the "v1"
| prefix and assigned to the "api" middleware group.
|
*/

Route::get('computers', [ComputerController::class, 'index'])->name('api.v1.computer.index');
Route::post('computers', [ComputerController::class, 'store'])->name('api.v1.computer.store');
Route::get('computers/{computer}', [ComputerController::class, 'show'])->name('api.v1.computer.show');
Route::put('computers/{computer}', [ComputerController::class, 'update'])->name('api.v1.computer.update');
Route::patch('computers/{computer}', [ComputerController::class, 'update'])->name('api.v1.computer.patch');
Route::delete('computers/{computer}', [ComputerController::class, 'destroy'])->name('api.v1.computer.destroy');

Route::get('areas', [AreaController::class, 'index'])->name('api.v1.areas.index');
Route::post('areas', [AreaController::class, 'store'])->name('api.v1.areas.store');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('api.v1.areas.show');
Route::put('areas/{area}', [AreaController::class, 'update'])->name('api.v1.areas.update');
Route::patch('areas/{area}', [AreaController::class, 'update'])->name('api.v1.areas.patch');
Route::delete('areas/{area}', [AreaController::class, 'destroy'])->name('api.v1.areas.destroy');

Route::get('apprentices', [ApprenticeController::class, 'index'])->name('api.v1.apprentice.index');
Route::post('apprentices', [ApprenticeController::class, 'store'])->name('api.v1.apprentice.store');
Route::get('apprentices/{apprentice}', [ApprenticeController::class, 'show'])->name('api.v1.apprentice.show');
Route::put('apprentices/{apprentice}', [ApprenticeController::class, 'update'])->name('api.v1.apprentice.update');
Route::patch('apprentices/{apprentice}', [ApprenticeController::class, 'update'])->name('api.v1.apprentice.patch');
Route::delete('apprentices/{apprentice}', [ApprenticeController::class, 'destroy'])->name('api.v1.apprentice.destroy');

Route::get('courses', [CourseController::class, 'index'])->name('api.v1.course.index');
Route::post('courses', [CourseController::class, 'store'])->name('api.v1.course.store');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('api.v1.course.show');
Route::put('courses/{course}', [CourseController::class, 'update'])->name('api.v1.course.update');
Route::patch('courses/{course}', [CourseController::class, 'update'])->name('api.v1.course.patch');
Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('api.v1.course.destroy');
Route::get('courses/{course}/teachers', [CourseTeacherController::class, 'index'])->name('api.v1.course.teachers.index');
Route::put('courses/{course}/teachers', [CourseTeacherController::class, 'sync'])->name('api.v1.course.teachers.sync');

Route::get('teachers', [TeacherController::class, 'index'])->name('api.v1.teacher.index');
Route::post('teachers', [TeacherController::class, 'store'])->name('api.v1.teacher.store');
Route::get('teachers/{teacher}', [TeacherController::class, 'show'])->name('api.v1.teacher.show');
Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('api.v1.teacher.update');
Route::patch('teachers/{teacher}', [TeacherController::class, 'update'])->name('api.v1.teacher.patch');
Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('api.v1.teacher.destroy');

Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('api.v1.training-center.index');
Route::post('training-centers', [TrainingCenterController::class, 'store'])->name('api.v1.training-center.store');
Route::get('training-centers/{trainingCenter}', [TrainingCenterController::class, 'show'])->name('api.v1.training-center.show');
Route::put('training-centers/{trainingCenter}', [TrainingCenterController::class, 'update'])->name('api.v1.training-center.update');
Route::patch('training-centers/{trainingCenter}', [TrainingCenterController::class, 'update'])->name('api.v1.training-center.patch');
Route::delete('training-centers/{trainingCenter}', [TrainingCenterController::class, 'destroy'])->name('api.v1.training-center.destroy');

Route::get('training_centers', [TrainingCenterController::class, 'index'])->name('api.v1.training_center.index');
Route::post('training_centers', [TrainingCenterController::class, 'store'])->name('api.v1.training_center.store');
Route::get('training_centers/{trainingCenter}', [TrainingCenterController::class, 'show'])->name('api.v1.training_center.show');
Route::put('training_centers/{trainingCenter}', [TrainingCenterController::class, 'update'])->name('api.v1.training_center.update');
Route::patch('training_centers/{trainingCenter}', [TrainingCenterController::class, 'update'])->name('api.v1.training_center.patch');
Route::delete('training_centers/{trainingCenter}', [TrainingCenterController::class, 'destroy'])->name('api.v1.training_center.destroy');

Route::get('news', [NewsController::class, 'index'])->name('api.v1.news.index');
Route::post('news', [NewsController::class, 'store'])->name('api.v1.news.store');
Route::get('news/{news}', [NewsController::class, 'show'])->name('api.v1.news.show');
Route::put('news/{news}', [NewsController::class, 'update'])->name('api.v1.news.update');
Route::patch('news/{news}', [NewsController::class, 'update'])->name('api.v1.news.patch');
Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('api.v1.news.destroy');
