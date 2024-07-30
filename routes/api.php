<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorController;

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

// Ruta Pisos
Route::get('/floors', [FloorController::class, 'index']);
// Route::get('/floors', function () {
//     return response()->json(['message' => 'Floors endpoint']);
// });

Route::get('/floor/{id}',function(){
    return "Obtener un piso";
});

Route::post("/floors",function(){
    return "Registrar un piso";
});

Route::put("/floors/{id}",function(){
    return "Actualizar piso";
});

Route::delete("/floors/{id}",function(){
    return "Eliminar piso";
});
