<?php

use App\Http\Controllers\BloqueEntrenamientoController;
use App\Http\Controllers\CiclistaController;
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
Route::get('/bloque', [BloqueEntrenamientoController::class, 'listBlockAPI'])->name('blockAPI.listBlock');
Route::post('/bloque/crear', [BloqueEntrenamientoController::class, 'createBlockAPI'])->name('blockAPI.createBlock');
Route::get('/bloque/{bloque}', [BloqueEntrenamientoController::class, 'listBlockByIdAPI'])->name('blockAPI.listBlockById');
Route::delete('/bloque/{bloque}/eliminar', [BloqueEntrenamientoController::class, 'deleteBlockAPI'])->name('blockAPI.deleteBlock');

// rutas para los planes de entrenamiento
Route::get('/plan', [PlanEntrenamientoController::class, 'listPlanAPI'])->name('planAPI.listPlan');
Route::middleware('auth:api')->post('/plan/crear', [PlanEntrenamientoController::class, 'createPlanAPI'])->name('planAPI.createPlan');
Route::put('/plan/{plan}', [PlanEntrenamientoController::class, 'updatePlanAPI'])->name('planAPI.updatePlan');
Route::delete('/plan/{plan}', [PlanEntrenamientoController::class, 'deleteBlockAPI'])->name('planAPI.deletePlan');

// rutas para las sesiones de entrenamiento
Route::get('/sesion', [SesionEntrenamientoController::class, 'listSessionAPI'])->name('sessionAPI.listSession');
Route::post('/sesion/crear', [SesionEntrenamientoController::class, 'createSessionAPI'])->name('sessionAPI.createSession');
Route::delete('/sesion/{sesion}', [SesionEntrenamientoController::class, 'deleteSessionAPI'])->name('sessionAPI.deleteSession');
Route::get('/sesion', [SesionEntrenamientoController::class, 'listSessionAPI'])->name('sessionAPI.listSession');
Route::get('/sesion/{sesion}', [SesionEntrenamientoController::class, 'listSessionByIdAPI'])->name('sessionAPI.listSessionById');

// rutas para los resultados de entrenamiento
Route::post('/resultado/crear', [ResultadosController::class, "createResultAPI"])->name('resultAPI.createResult');
Route::get('/resultado/{resultado}', [ResultadosController::class, "listResultByIdAPI"])->name('resultAPI.listResultById');

// rutas para la sesion-plan entrenamiento
Route::get('/sesionBloque', [SesionPlanController::class, 'listSessionPlanAPI'])->name('sessionPlanAPI.listSessionPlan');
Route::post('/sesionBloque/crear', [SesionPlanController::class, 'createSessionPlanAPI'])->name('sessionPlanAPI.createSessionPlan');
Route::delete('/sesionBloque/{sesionPlan}', [SesionPlanController::class, 'deleteSessionPlanAPI'])->name('sessionPlanAPI.deleteSessionPlan');
