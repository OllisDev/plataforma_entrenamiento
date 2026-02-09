<?php

namespace App\Http\Controllers;

use App\Models\Plan_entrenamiento;
use Illuminate\Http\Request;

class PlanEntrenamientoController extends Controller
{
    public function listPlanes(Plan_entrenamiento $plan)
    {
        // SELECT nombre, descripcion, fecha_inicio, fecha_fin, objetivo, activo FROM plan_entrenamiento
        $planes = $plan->select('nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'objetivo', 'activo')->get();
        return (view('plan', compact('planes'))); // compact -> recuperar variable en la vista
    }
}
