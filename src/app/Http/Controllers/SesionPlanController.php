<?php

namespace App\Http\Controllers;

use App\Models\SesionBloque;


class SesionPlanController extends Controller
{
    public function listSesionPlan(SesionBloque $sesionPlan)
    {
        // SELECT orden, repeticiones FROM sesion_bloque
        $sesionesPlan = $sesionPlan->select('orden', 'repeticiones')->get();
        return view('sesionBloque', compact('sesionesPlan'));
    }
}
