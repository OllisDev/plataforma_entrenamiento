<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiclistaController;

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

// -- RUTAS PARA LA FUNCIONALIDAD DE LAS PÁGINAS --

// rutas para la autenticación
Route::post('/register', [CiclistaController::class, 'register'])->name('cyclist.register');
Route::post('/login', [CiclistaController::class, 'login'])->name('cyclist.login');
