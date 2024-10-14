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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'rooms'], function () {
    Route::get('/', [RoomController::class, 'index']);       // Obtener todas las habitaciones
    Route::post('/store', [RoomController::class, 'store']);      // Crear una nueva habitación
    Route::get('/{id}', [RoomController::class, 'show']);    // Obtener una habitación específica
    Route::put('/update/{id}', [RoomController::class, 'update']);  // Actualizar una habitación
    Route::put('/delete/{id}', [RoomController::class, 'delete']); // Desactivar una habitación
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
