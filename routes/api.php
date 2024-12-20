<?php

use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\FloorController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'rooms'], function () {
    Route::get('/', [RoomController::class, 'index']);       // Obtener todas las habitaciones
    Route::post('/store', [RoomController::class, 'store']);      // Crear una nueva habitación
    Route::put('/update/{id}', [RoomController::class, 'update']);  // Actualizar una habitación
    Route::delete('/delete/{id}', [RoomController::class, 'delete']); // Desactivar una habitación
});
Route::group(['prefix' => 'services'], function () {
    Route::get('/', [\App\Http\Controllers\ServicesController::class, 'index']);       // Obtener todas las habitaciones
    Route::post('/store', [\App\Http\Controllers\ServicesController::class, 'store']);      // Crear una nueva habitación
    Route::put('/update/{id}', [\App\Http\Controllers\ServicesController::class, 'update']);  // Actualizar una habitación
    Route::delete('/delete/{id}', [\App\Http\Controllers\ServicesController::class, 'delete']); // Desactivar una habitación
});
Route::group(['prefix' => 'box'], function () {
    Route::get('/', [\App\Http\Controllers\BoxController::class, 'index']);       // Obtener todas las habitaciones
    Route::post('/store', [\App\Http\Controllers\BoxController::class, 'store']);      // Crear una nueva habitación
    Route::put('/update/{id}', [\App\Http\Controllers\BoxController::class, 'update']);  // Actualizar una habitación
    Route::delete('/delete/{id}', [\App\Http\Controllers\BoxController::class, 'delete']); // Desactivar una habitación
});
Route::group(['prefix' => 'daylibox'], function () {
    Route::get('/bybox/{box_id}', [\App\Http\Controllers\DayliBoxController::class, 'index']);       // Obtener todas las habitaciones
    Route::post('/open', [\App\Http\Controllers\DayliBoxController::class, 'store']);      // Crear una nueva habitación
    Route::put('/close/{id}', [\App\Http\Controllers\DayliBoxController::class, 'update']);  // Actualizar una habitación
});

// Ruta Pisos
// Route::get('/floors', c);
// Route::get('/floors', function () {
//     return response()->json(['message' => 'Floors endpoint']);
// });

// Route::get('/floor/{id}',function(){
//     return "Obtener un piso";
// });

// Route::post("/floors",function(){
//     return "Registrar un piso";
// });

// Route::put("/floors/{id}",function(){
//     return "Actualizar piso";
// });

// Route::delete("/floors/{id}",function(){
//     return "Eliminar piso";
// });
