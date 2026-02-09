<?php

namespace App\Http\Controllers;

use App\Models\sesion_entrenamiento;
use Illuminate\Http\Request;

class SesionEntrenamientoController extends Controller
{
    public function listSesiones(sesion_entrenamiento $sesion)
    {
        // SELECT nombre, descripcion, completada FROM sesion_entrenamiento
        $sesiones = $sesion->select('nombre', 'descripcion', 'completada')->get();
        return view('sesion', compact('sesiones'));
    }
}
