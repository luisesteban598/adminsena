<?php
use App\Http\Controllers\ComputerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;

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
Route::delete('computers/{computer}', [ComputerController::class, 'destroy']);


Route::get('areas', [AreaController::class, 'index']);
Route::post('areas', [AreaController::class, 'store']);
Route::get('areas/{area}', [AreaController::class, 'show']);
Route::put('areas/{area}', [AreaController::class, 'update']);
Route::delete('areas/{area}', [AreaController::class, 'destroy']);

