<?php

namespace App\Http\Controllers;

use App\Models\SesionBloque;
use Illuminate\Http\Request;

class SesionPlanController extends Controller
{
    public function listSessionBlockAPI(SesionBloque $sesionBloque)
    {
        try {
            // SELECT orden, repeticiones FROM sesion_bloque
            $sesionesBloque = $sesionBloque->select('id', 'orden', 'repeticiones')->get();

            if ($sesionesBloque) {
                $response = [
                    'response' => 200,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Sesion-Plan',
                    'sesion-plan' => $sesionesBloque
                ];
                return response($response, 200);
            } else {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'ok',
                    'message' => 'La sesión de bloque no existe.'
                ];
                return response($response, 404);
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

    public function createSessionBlockAPI(Request $request)
    {
        try {
            $data = $request->validate([
                'id_sesion_entrenamiento' => 'required|exists:sesion_entrenamiento,id',
                'id_bloque_entrenamiento' => 'required|exists:bloque_entrenamiento,id',
                'orden' => 'required|integer',
                'repeticiones' => 'required|integer'
            ]);

            $sesionBloque = SesionBloque::create($data);

            if ($sesionBloque) {
                $response = [
                    'response' => 201,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Se ha creado la sesión de bloque correctamente.'
                ];
                return response()->json($response, 201);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            if (isset($e->validator->failed()['id_sesion_entrenamiento']['Exists'])) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'La sesión de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }
            if (isset($e->validator->failed()['id_bloque_entrenamiento']['Exists'])) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'El bloque de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }
            $response = [
                'response' => 400,
                'success' => false,
                'status' => 'error',
                'message' => 'Formato incorrecto.'
            ];
            return response()->json($response, 400);
        }
    }

    public function deleteSessionBlockAPI($id)
    {
        try {
            $sesionBloque = SesionBloque::where('id', $id)->first();

            if (!$sesionBloque) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'La sesión de bloque no existe.'
                ];
                return response()->json($response, 404);
            }

            $sesionBloque->delete();

            $response = [
                'response' => 200,
                'success' => true,
                'status' => 'ok',
                'message' => "La sesión de bloque ha sido eliminada correctamente"
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
