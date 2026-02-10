<?php

namespace App\Http\Controllers;

use App\Models\BloqueEntrenamiento;
use Illuminate\Http\Request;

class BloqueEntrenamientoController extends Controller
{
    public function listBlock(BloqueEntrenamiento $bloque)
    {
        $bloques = $bloque->select('nombre', 'descripcion', 'tipo', 'duracion_estimada', 'potencia_pct_min', 'potencia_pct_max', 'pulso_reserva_pct', 'comentario')->get();
        return view('bloque', compact('bloques'));
    }
}
