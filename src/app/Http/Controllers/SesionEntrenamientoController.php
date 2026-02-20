<?php

namespace App\Http\Controllers;

use App\Models\SesionEntrenamiento;
use Illuminate\Http\Request;

class SesionEntrenamientoController extends Controller
{
    public function listSesiones(SesionEntrenamiento $sesion)
    {
        // SELECT nombre, descripcion, completada FROM sesion_entrenamiento
        $sesiones = $sesion->select('id', 'nombre', 'descripcion', 'completada')->get();
        return view('sesion', compact('sesiones'));
    }

    public function listSessionAPI(SesionEntrenamiento $sesion)
    {
        try {
            // SELECT nombre, descripcion, completada FROM sesion_entrenamiento
            $sesiones = $sesion->select('id', 'nombre', 'descripcion', 'completada')->get();

            if ($sesiones) {
                $response = [
                    'response' => 200,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Sesiones',
                    'sesion' => $sesiones
                ];
                return response()->json($response, 200);
            } else {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'La sesión de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            $response = [
                'response' => 400,
                'success' => false,
                'status' => 'error',
                'message' => 'Formato incorrecto.'
            ];
            return response()->json($response, 404);
        }
    }

    public function listSessionByIdAPI(SesionEntrenamiento $sesiones, $id)
    {
        try {
            $sesion = $sesiones->select('nombre', 'descripcion', 'completada')->where('id', $id)->first();

            if ($sesion) {
                $response = [
                    'response' => 200,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Sesion',
                    'sesion' => $sesion
                ];
                return response()->json($response, 200);
            } else {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'La sesión de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            $response = [
                'response' => 400,
                'success' => false,
                'status' => 'error',
                'message' => 'Formato incorrecto.'
            ];
            return response()->json($response, 404);
        }
    }

    public function createSessionAPI(Request $request)
    {
        try {
            $data = $request->validate([
                'id_plan' => 'required|exists:plan_entrenamiento,id',
                'nombre' => 'required|string|max:100',
                'descripcion' => 'required|string|max:255',
                'completada' => 'required|boolean'
            ]);

            $sesion = SesionEntrenamiento::create($data);

            if ($sesion) {
                $response = [
                    'response' => 201,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Se ha creado la sesión de entrenamiento correctamente.'
                ];
                return response()->json($response, 201);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            if (isset($e->validator->failed()['id_plan']['Exists'])) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'El plan de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }
            $response = [
                'response' => 400,
                'success' => false,
                'status' => 'error',
                'message' => 'Formato incorrecto.'
            ];
            return response()->json($response, 404);
        }
    }

    public function deleteSessionAPI($id)
    {
        try {
            $sesion = SesionEntrenamiento::where('id', $id)->first();

            if (!$sesion) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'La sesión de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }

            $sesion->delete();

            $response = [
                'response' => 200,
                'success' => true,
                'status' => 'ok',
                'message' => 'La sesión de entrenamiento se ha eliminada correctamente.'
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
