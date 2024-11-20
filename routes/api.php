<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */

Route::get('/hola/locos',
    [App\Http\Controllers\CabinController::class, 'index'])->name('hola.locos');  //<a href = "{{route('hola.locos')}}">Hola locos</a>
Route::get('/buenas/todos',
    [App\Http\Controllers\ServiceController::class, 'index']);

Route::get('cabin',
    [App\Http\Controllers\CabinController::class, 'index']);

Route::get('cabin/{id}',
    [App\Http\Controllers\CabinController::class, 'show']);

Route::get('/cabin/{id}/services', function ($id) {
    $cabin = \App\Models\Cabin:: with('services')->findOrFail($id);

    return response()->json([
        'message' => 'Servicios asociados a la cabaña.',
        'data' => $cabin->services, // Devuelve los servicios asociados
]);
});


Route::get('/cabin/{id}/users', function ($id) {
    $cabin = \App\Models\Cabin:: with('users')->findOrFail($id);

    return response()->json([
        'message' => 'La reserva del usuario ',
        'data' => $cabin->users, // Devuelve los usuarios asociados
]);
});

Route::get('/service',
    [App\Http\Controllers\ServiceController::class, 'index']);

Route::get('/service/{id}',
    [App\Http\Controllers\ServiceController::class, 'show']);

Route::get('/cabinLevel',
    [App\Http\Controllers\CabinLevelControllr::class, 'index']);

Route::get('/cabinLevel/{id}',
    [App\Http\Controllers\CabinLevelControllr::class, 'show']);

Route::get('/user',
    [App\Http\Controllers\UserController::class, 'index']);

Route::get('/user/{id}',
    [App\Http\Controllers\UserController::class, 'show']);

Route::post('/v1/login',
    [App\Http\Controllers\api\v1\AuthController::class,
        'login'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/v1/logout',
        [App\Http\Controllers\api\v1\AuthController::class,
            'logout'])->name('api.logout');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('cabin',
    App\Http\Controllers\CabinController::class)->except('index', 'show');

    Route::post('/cabin/{id}/services',
    [App\Http\Controllers\CabinController::class, 'addServices']);

    Route::post('/cabin/{id}/users',
    [App\Http\Controllers\CabinController::class, 'addUsers']);

    Route::apiResource('/service',
    App\Http\Controllers\ServiceController::class)->except('index', 'show');

    Route::apiResource('/cabinLevel',
    App\Http\Controllers\CabinLevelControllr::class)->except('index', 'show');

    Route::apiResource('/user',
    App\Http\Controllers\UserController::class)->except('index', 'show');
});
