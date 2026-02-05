<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiclistaController;

Route::get('/login', function () {
    return view('login');
});

// -- RUTAS PARA LA VISUALIZACIÓN DEL SITIO WEB

// rutas para la autenticación
Route::post('/register', [CiclistaController::class, 'register'])->name('cyclist.register');
Route::post('/login', [CiclistaController::class, 'login'])->name('cyclist.login');
