<?php

namespace App\Http\Controllers;

use App\Models\Ciclista;
use Illuminate\Http\Request;

class CiclistaController extends Controller
{
    /*
    public function register(Request $request, Ciclista $ciclista)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:80',
            'apellidos' => 'required|string|max:80',
            'fecha_nacimiento' => 'date',
            'email' => 'required|string|max:80',
            'password' => 'required|string|max:30'
        ]);
        $ciclista->create($data);
        return redirect()->route('ciclista.login');
    }
    */
}
