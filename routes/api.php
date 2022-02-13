<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth', [AuthController::class, 'authenticate']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [RegisterController::class, 'register']);


// Only authenticated requests
Route::middleware('auth:sanctum')->group(function () {

    Route::get('tasks', [TaskController::class, 'index']);
    Route::get('tasks/{id}', [TaskController::class, 'show']);
    Route::post('tasks', [TaskController::class, 'store']);
    Route::put('tasks/{id}',[TaskController::class, 'update']);
    Route::delete('tasks/{id}', [TaskController::class, 'destroy']);

});
