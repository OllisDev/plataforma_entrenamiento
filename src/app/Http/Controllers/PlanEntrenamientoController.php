<?php

namespace App\Http\Controllers;

use App\Models\PlanEntrenamiento;
use Illuminate\Http\Request;

class PlanEntrenamientoController extends Controller
{
    public function listPlanes(PlanEntrenamiento $plan)
    {
        // SELECT nombre, descripcion, fecha_inicio, fecha_fin, objetivo, activo FROM plan_entrenamiento
        $planes = $plan->select('nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'objetivo', 'activo')->get();
        return (view('plan', compact('planes'))); // compact -> recuperar variable en la vista
    }
}
