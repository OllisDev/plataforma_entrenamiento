<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiclistaController;
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
Route::get('/plan', [PlanEntrenamientoController::class, "listPlan"])->name('plan.listPlan');
Route::post('/plan/crear', [PlanEntrenamientoController::class, "createPlan"])->name('plan.createPlan');

// rutas para las sesiones de entrenamiento
Route::get('/sesion', [SesionEntrenamientoController::class, 'listSesiones'])->name('session.listSession');

// rutas para la sesion-plan
Route::get('/sesionBloque', [SesionPlanController::class, 'listSesionPlan'])->name('sessionPlan.listSesionBloque');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
