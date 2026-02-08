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

// rutas para autenticacion
Route::post('/register', [CiclistaController::class, 'registerAPI'])->name('cyclist.register');
Route::post('/login', [CiclistaController::class, 'loginAPI'])->name('cyclist.login');
Route::post('/logout', [CiclistaController::class, 'logoutAPI'])->name('cyclist.logout');

// rutas para los bloques de entrenamiento
Route::get('/bloque', [BloqueEntrenamientoController::class, 'listBlockAPI'])->name('block.listBlock');
Route::post('/bloque/crear', [BloqueEntrenamientoController::class, 'createBlockAPI'])->name('block.createBlock');
Route::get('/bloque/{bloque}', [BloqueEntrenamientoController::class, 'listBlockByIdAPI'])->name('block.listBlockById');
Route::delete('/bloque/{bloque}/eliminar', [BloqueEntrenamientoController::class, 'deleteBlockAPI'])->name('block.deleteBlock');

// rutas para los planes de entrenamiento
Route::get('/plan', [PlanEntrenamientoController::class, 'listPlanAPI'])->name('plan.listPlan');
Route::post('/plan/crear', [PlanEntrenamientoController::class, 'createPlanAPI'])->name('plan.createPlan');
Route::put('/plan/{plan}', [PlanEntrenamientoController::class, 'updatePlanAPI'])->name('plan.updatePlan');
Route::delete('/plan/{plan}', [PlanEntrenamientoController::class, 'deleteBlockAPI'])->name('plan.deleteBlock');

// rutas para las sesiones de entrenamiento
Route::get('/sesion', [SesionEntrenamientoController::class, 'listSessionAPI'])->name('session.listSession');
Route::post('/sesion/crear', [SesionEntrenamientoController::class, 'createSessionAPI'])->name('session.createSession');
Route::delete('/sesion/{sesion}', [SesionEntrenamientoController::class, 'deleteSessionAPI'])->name('session.deleteSession');
Route::get('/sesion', [SesionEntrenamientoController::class, 'listSessionAPI'])->name('session.listSession');
Route::get('/sesion/{sesion}', [SesionEntrenamientoController::class, 'listSessionByIdAPI'])->name('session.listSessionById');

// rutas para los resultados de entrenamiento
Route::post('/resultado/crear', [ResultadosController::class, "createResultAPI"])->name('result.createResult');
Route::get('/resultado/{resultado}', [ResultadosController::class, "listResultByIdAPI"])->name('result.listResultById');

// rutas para la sesion-plan entrenamiento
Route::get('/sesionBloque', [SesionPlanController::class, 'listSessionPlanAPI'])->name('sessionPlan.listSessionPlan');
Route::post('/sesionBloque/crear', [SesionPlanController::class, 'createSessionPlanAPI'])->name('sessionPlan.createSessionPlan');
Route::delete('/sesionBloque/{sesionPlan}', [SesionPlanController::class, 'deleteSessionPlanAPI'])->name('sessionPlan.deleteSessionPlan');
