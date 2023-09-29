<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::get("/",[TareasController::class,"listar"]);
    Route::get("/tarea/{d}/",[TareasController::class,"ListarUno"]);
    Route::delete("/tarea/{d}",[TareasController::class,"EliminarTarea"]);
    Route::put("/tarea/{d}",[TareasController::class,"ModificarTarea"]);
    Route::post("/tarea",[TareasController::class,"InsertarTarea"]);
});
