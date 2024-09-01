<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TaskControllerApi;
use App\Http\Controllers\api\AuthApiController;

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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskControllerApi::class, 'index']);
    Route::post('/tasks', [TaskControllerApi::class, 'store']);
    Route::get('/tasks/{task}', [TaskControllerApi::class, 'show']);
    Route::put('/tasks/{task}', [TaskControllerApi::class, 'update']);
    Route::delete('/tasks/{task}', [TaskControllerApi::class, 'destroy']);

    // API route for logout
    Route::post('/logout', [AuthApiController::class, 'logout']);
});

// Routes for registration and login without authentication
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
