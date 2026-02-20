<?php

namespace App\Http\Controllers;

use App\Models\PlanEntrenamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PlanEntrenamientoController extends Controller
{
    public function listPlanAPI(PlanEntrenamiento $plan)
    {
        try {
            // SELECT id, nombre, descripcion, fecha_inicio, fecha_fin, objetivo, activo FROM plan_entrenamiento
            $planes = $plan->where('id_ciclista', Auth::id())->select('id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'objetivo', 'activo')->get();

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
                    'message' => 'Se ha creado el plan de entrenamiento correctamente.'
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

    public function updatePlanAPI(Request $request, $id)
    {
        try {
            // guardar id
            $plan = PlanEntrenamiento::find($id);

            if (!$plan) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'El plan de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }

            $data = $request->validate([
                'nombre' => 'required|string|max:100',
                'descripcion' => 'required|string|max:255',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date',
                'objetivo' => 'required|string|max:100',
                'activo' => 'required|boolean'
            ]);

            $data['id_ciclista'] = Auth::id();
            // UPDATE plan_entrenamiento SET nombre=?, descripcion=?, fecha_inicio=?, fecha_fin=?, objetivo=?, activo=? WHERE id=?
            $plan->update($data);

            $response = [
                'response' => 200,
                'success' => true,
                'status' => 'ok',
                'message' => 'El plan de entrenamiento se ha actualizado correctamente.'
            ];
            return response($response, 200);

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

    public function editPlan($id)
    {
        $plan = PlanEntrenamiento::findOrFail($id);
        return view('editPlan', compact('plan'));
    }

    public function deletePlanAPI($id)
    {
        try {

            $plan = PlanEntrenamiento::where('id', $id)->where('id_ciclista', Auth::id())->first();

            if (!$plan) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'No existe el plan de entrenamiento.'
                ];
                return response()->json($response, 404);
            }

            $plan->delete();

            $response = [
                'response' => 200,
                'success' => true,
                'status' => 'ok',
                'message' => 'El plan de entrenamiento ha sido creado correctamente.'
            ];

            return response()->json($response, 200);

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
