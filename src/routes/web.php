<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiclistaController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\BloqueEntrenamientoController;
use App\Http\Controllers\PlanEntrenamientoController;
use App\Http\Controllers\SesionEntrenamientoController;
use App\Http\Controllers\SesionPlanController;

// -- RUTAS PARA LA REDIRECCIÓN DE LAS VISTAS -- 

Route::get('/', function () {
    return view('main');
})->middleware(['auth'])->name('main'); // middleware -> obligar solo a los ususarios autenticados acceder a la pagina principal, sino redirige al login

Route::get('/plan/crear', function () {
    return view('createPlan');
});

Route::get('/plan', function () {
    return view('plan');
})->name('plan.view');

Route::get('/sesion', function () {
    return view('sesion');
})->name('sesion.view');

Route::get('/sesion/crear', function () {
    return view('createSesion');
});

Route::get('/bloque', function () {
    return view('bloque');
})->name('bloque.view');

Route::get('bloque/crear', function () {
    return view('createBloque');
});

Route::get('/sesionBloque', function () {
    return view('sesionBloque');
})->name('sesionBloque.view');

Route::get('/sesionBloque/crear', function () {
    return view('createSesionBloque');
});

Route::get('/resultado', function () {
    return view('resultado');
})->name('resultado.view');

Route::get('/resultado/crear', function () {
    return view('createResultado');
});

// -- RUTAS PARA LA FUNCIONALIDAD DE LAS PÁGINAS --

// rutas para la autenticación
Route::post('/register', [CiclistaController::class, 'register'])->name('cyclist.register');
Route::post('/login', [CiclistaController::class, 'login'])->name('cyclist.login');

// rutas para los bloques de entrenamiento
Route::get('/bloque/listar', [BloqueEntrenamientoController::class, 'listBlockAPI'])->name('block.listBlock');
Route::post('/bloque/crear', [BloqueEntrenamientoController::class, "createBlockAPI"])->name('block.createBlock');
Route::delete('/bloque/{bloque}/eliminar', [BloqueEntrenamientoController::class, "deleteBlockAPI"])->name('block.deleteBlock');

// rutas para los planes de entrenamiento
Route::get('/plan/listar', [PlanEntrenamientoController::class, "listPlanAPI"])->name('plan.listPlan');
Route::post('/plan/crear', [PlanEntrenamientoController::class, "createPlanAPI"])->name('plan.createPlan');
Route::get('/plan/{plan}/editar', [PlanEntrenamientoController::class, "editPlan"])->name('plan.editPlan');
Route::put('/plan/{plan}/actualizar', [PlanEntrenamientoController::class, "updatePlanAPI"])->name('plan.updatePlan');
Route::delete('/plan/{plan}/eliminar', [PlanEntrenamientoController::class, "deletePlanAPI"])->name('plan.deletePlan');

// rutas para las sesiones de entrenamiento
Route::get('/sesion/listar', [SesionEntrenamientoController::class, 'listSessionAPI'])->name('session.listSession');
Route::post('/sesion/crear', [SesionEntrenamientoController::class, 'createSessionAPI'])->name('session.createSession');
Route::delete('/sesion/{sesion}/eliminar', [SesionEntrenamientoController::class, "deleteSessionAPI"])->name('session.deleteSession');

// rutas para la sesion-plan
Route::get('/sesionBloque/listar', [SesionPlanController::class, 'listSessionBlockAPI'])->name('sessionPlan.listSesionBloque');
Route::post('/sesionBloque/crear', [SesionPlanController::class, 'createSessionBlockAPI'])->name('sessionPlan.createSessionBlock');
Route::delete('/sesionBloque/{sesion}/eliminar', [SesionPlanController::class, "deleteSessionBlockAPI"])->name('sessionPlan.deleteSessionBlock');

// rutas para los resultados de entrenamiento
Route::post('/resultado/crear', [ResultadosController::class, "createResultAPI"])->name('result.createResult');
Route::get('/resultado/ciclista/{ciclista}', [ResultadosController::class, "listResultByCiclistaAPI"])->name('result.listResultByCiclista');
Route::delete('/resultado/{resultado}/eliminar', [ResultadosController::class, "deleteResultAPI"])->name('result.deleteResult');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
