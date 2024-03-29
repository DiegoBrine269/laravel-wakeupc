<?php

use App\Http\Controllers\RegistrosController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/registros', [RegistrosController::class, 'index']);
Route::post('/registros', [RegistrosController::class, 'crear']);

// Route::get('/actualizar-estado', [RegistrosController::class, 'actualizarEstado']);
Route::get('/obtener-estado', [RegistrosController::class, 'obtenerEstado']);