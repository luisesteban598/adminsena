<?php
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
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
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('computers', [ComputerController::class,'index']);
Route::post('computers', [ComputerController::class, 'store']);
Route::get('computers/{computer}', [ComputerController::class, 'show']);
Route::put('computers/{computer}', [ComputerController::class, 'update']);
Route::patch('computers/{computer}', [ComputerController::class, 'update']);
Route::delete('computers/{computer}', [ComputerController::class, 'destroy']);


Route::get('areas', [AreaController::class, 'index']);
Route::post('areas', [AreaController::class, 'store']);
Route::get('areas/{area}', [AreaController::class, 'show']);
Route::put('areas/{area}', [AreaController::class, 'update']);
Route::patch('areas/{area}', [AreaController::class, 'update']);
Route::delete('areas/{area}', [AreaController::class, 'destroy']);

Route::apiResource('apprentices', ApprenticeController::class);
Route::apiResource('courses', CourseController::class);
Route::get('courses/{course}/teachers', [CourseTeacherController::class, 'index']);
Route::put('courses/{course}/teachers', [CourseTeacherController::class, 'sync']);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('training-centers', TrainingCenterController::class)
	->parameters(['training-centers' => 'trainingCenter']);
Route::apiResource('training_centers', TrainingCenterController::class)
	->parameters(['training_centers' => 'trainingCenter']);
Route::apiResource('news', NewsController::class);

