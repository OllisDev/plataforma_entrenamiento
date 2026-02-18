<?php

namespace App\Http\Controllers;

use App\Models\PlanEntrenamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PlanEntrenamientoController extends Controller
{
    public function listPlan(PlanEntrenamiento $plan)
    {
        // SELECT nombre, descripcion, fecha_inicio, fecha_fin, objetivo, activo FROM plan_entrenamiento
        $planes = $plan->select('nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'objetivo', 'activo')->get();
        return (view('plan', compact('planes'))); // compact -> recuperar variable en la vista
    }

    public function listPlanAPI(PlanEntrenamiento $plan)
    {
        // SELECT nombre, descripcion, fecha_inicio, fecha_fin, objetivo, activo FROM plan_entrenamiento
        $planes = $plan->select('nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'objetivo', 'activo')->get();

        if ($planes) {
            $response = [
                'response' => 200,
                'success' => true,
                'status' => 'ok',
                'message' => 'Planes',
                'plan' => $planes
            ];
            return response()->json($response, 200);
        }
    }

    public function createPlanAPI(Request $request)
    {
        try {
            // INSERT INTO plan_entrenamiento (nombre, descripcion, fecha_inicio, fecha_fin, objetivo, activo) VALUES (?, ?, ?, ?, ?, ?)
            $data = $request->validate([
                'nombre' => 'required|string|max:100',
                'descripcion' => 'required|string|max:255',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date',
                'objetivo' => 'required|string|max:100',
                'activo' => 'required|boolean'
            ]);

            $data['id_ciclista'] = Auth::id();
            $plan = PlanEntrenamiento::create($data);

            if ($plan) {
                $response = [
                    'response' => 201,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Se ha creado el libro correctamente.'
                ];
                return response()->json($response, 201);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            $response = [
                'response' => 400,
                'success' => false,
                'status' => 'error',
                'message' => 'Formato incorrecto.'
            ];
            return response()->json($response, 400);
        }
    }
}
