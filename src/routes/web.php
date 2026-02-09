<?php

use App\Http\Controllers\BloqueEntrenamientoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiclistaController;
use App\Http\Controllers\PlanEntrenamientoController;
use App\Http\Controllers\SesionEntrenamientoController;
use App\Http\Controllers\SesionPlanController;

// -- RUTAS PARA LA REDIRECCIÓN DE LAS VISTAS -- 

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('main');
});

Route::get('/plan', function () {
    return view('plan');
});

Route::get('/plan/crear', function () {
    return view('createPlan');
});

Route::get('/sesion', function () {
    return view('sesion');
});

Route::get('/sesion/crear', function () {
    return view('createSesion');
});

Route::get('/bloque', function () {
    return view('bloque');
});

Route::get('bloque/crear', function () {
    return view('createBloque');
});

Route::get('/sesionBloque', function () {
    return view('sesionBloque');
});

Route::get('/sesionBloque/crear', function () {
    return view('createSesionBloque');
});

Route::get('/resultado', function () {
    return view('resultado');
});

Route::get('/resultado/crear', function () {
    return view('createResultado');
});

// -- RUTAS PARA LA FUNCIONALIDAD DE LAS PÁGINAS --

// rutas para la autenticación
Route::post('/register', [CiclistaController::class, 'register'])->name('cyclist.register');
Route::post('/login', [CiclistaController::class, 'login'])->name('cyclist.login');

// rutas para los bloques de entrenamiento
Route::get('/bloque', [BloqueEntrenamientoController::class, 'listBlock'])->name('block.listBlock');

// rutas para los planes de entrenamiento
Route::get('/plan', [PlanEntrenamientoController::class, "listPlanes"])->name('plan.listPlanes');
Route::post('/plan', [PlanEntrenamientoController::class, "createPlan"])->name('plan.createPlan');

// rutas para las sesiones de entrenamiento
Route::get('/sesion', [SesionEntrenamientoController::class, 'listSesiones'])->name('sesiones.listSesiones');

// rutas para la sesion-plan
Route::get('/sesionBloque', [SesionPlanController::class, 'listSesionPlan'])->name('sessionPlan.listSesionBloque');
