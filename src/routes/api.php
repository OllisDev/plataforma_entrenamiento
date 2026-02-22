<?php

use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\BloqueEntrenamientoController;
use App\Http\Controllers\PlanEntrenamientoController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\SesionEntrenamientoController;
use App\Http\Controllers\SesionPlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// -- RUTAS PARA PROBAR LAS PETICIONES MEDIANTE API REST --

// rutas para los bloques de entrenamiento
Route::middleware('auth:api')->get('/bloque', [BloqueEntrenamientoController::class, 'listBlockAPI'])->name('blockAPI.listBlock');
Route::middleware('auth:api')->post('/bloque/crear', [BloqueEntrenamientoController::class, 'createBlockAPI'])->name('blockAPI.createBlock');
Route::middleware('auth:api')->get('/bloque/{bloque}', [BloqueEntrenamientoController::class, 'listBlockByIdAPI'])->name('blockAPI.listBlockById');
Route::middleware('auth:api')->delete('/bloque/{bloque}/eliminar', [BloqueEntrenamientoController::class, 'deleteBlockAPI'])->name('blockAPI.deleteBlock');

// rutas para los planes de entrenamiento
Route::middleware('auth:api')->get('/plan', [PlanEntrenamientoController::class, 'listPlanAPI'])->name('planAPI.listPlan');
Route::middleware('auth:api')->post('/plan/crear', [PlanEntrenamientoController::class, 'createPlanAPI'])->name('planAPI.createPlan');
Route::middleware('auth:api')->put('/plan/{plan}', [PlanEntrenamientoController::class, 'updatePlanAPI'])->name('planAPI.updatePlan');
Route::middleware('auth:api')->delete('/plan/{plan}', [PlanEntrenamientoController::class, 'deletePlanAPI'])->name('planAPI.deletePlan');

// rutas para las sesiones de entrenamiento
Route::middleware('auth:api')->get('/sesion', [SesionEntrenamientoController::class, 'listSessionAPI'])->name('sessionAPI.listSession');
Route::middleware('auth:api')->post('/sesion/crear', [SesionEntrenamientoController::class, 'createSessionAPI'])->name('sessionAPI.createSession');
Route::middleware('auth:api')->delete('/sesion/{sesion}', [SesionEntrenamientoController::class, 'deleteSessionAPI'])->name('sessionAPI.deleteSession');
Route::middleware('auth:api')->get('/sesion/{sesion}', [SesionEntrenamientoController::class, 'listSessionByIdAPI'])->name('sessionAPI.listSessionById');

// rutas para los resultados de entrenamiento
Route::middleware('auth:api')->post('/resultado/crear', [ResultadosController::class, "createResultAPI"])->name('resultAPI.createResult');
Route::middleware('auth:api')->get('/resultado/ciclista/{ciclista}', [ResultadosController::class, "listResultByCiclistaAPI"])->name('resultAPI.listResultByCiclista');
Route::middleware('auth:api')->delete('/resultado/{resultado}/eliminar', [ResultadosController::class, "deleteResultAPI"])->name('resultAPI.deleteResultAPI');

// rutas para bicicletas
Route::get('/bicicleta', [BicicletaController::class, 'listBicycleAPI'])->name('bicycleAPI.listBicycle');
Route::middleware('auth:api')->post('/bicicleta/crear', [BicicletaController::class, 'createBicycleAPI'])->name('bicycleAPI.createBicycle');

// rutas para la sesion-plan entrenamiento
Route::get('/sesionBloque', [SesionPlanController::class, 'listSessionBlockAPI'])->name('sessionPlanAPI.listSessionBlock');
Route::post('/sesionBloque/crear', [SesionPlanController::class, 'createSessionBlockAPI'])->name('sessionPlanAPI.createSessionBlock');
Route::delete('/sesionBloque/{sesionPlan}', [SesionPlanController::class, 'deleteSessionBlockAPI'])->name('sessionPlanAPI.deleteSessionBlock');
