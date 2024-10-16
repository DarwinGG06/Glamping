<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */

Route::get('/hola/locos', 
    [App\Http\Controllers\CabinController::class, 'index']) ->name ('hola.locos');  //<a href = "{{route('hola.locos')}}">Hola locos</a>
Route::get('/buenas/todos', 
    [App\Http\Controllers\ServiceController::class, 'index']);

Route::apiResource('/cabin',
    App\Http\Controllers\CabinController::class);

Route::apiResource('/service',
    App\Http\Controllers\ServiceController::class);

Route::apiResource('/cabinLevel',
    App\Http\Controllers\CabinLevelController::class);

Route::apiResource('/user',
    App\Http\Controllers\UserController::class);

