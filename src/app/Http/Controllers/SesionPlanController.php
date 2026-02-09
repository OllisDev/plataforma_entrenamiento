<?php

namespace App\Http\Controllers;

use App\Models\Sesion_bloque;
use Illuminate\Http\Request;

class SesionPlanController extends Controller
{
    public function listSesionPlan(Sesion_bloque $sesionPlan)
    {
        // SELECT orden, repeticiones FROM sesion_bloque
        $sesionesPlan = $sesionPlan->select('orden', 'repeticiones')->get();
        return view('sesionBloque', compact('sesionesPlan'));
    }
}
