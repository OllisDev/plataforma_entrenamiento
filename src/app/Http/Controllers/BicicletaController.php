<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;
use Illuminate\Http\Request;

class BicicletaController extends Controller
{
    public function listBicycleAPI(Bicicleta $bicicleta)
    {
        try {
            $bicicletas = $bicicleta->select('id', 'nombre', 'tipo', 'comentario')->get();

            if ($bicicletas) {
                $response = [
                    'response' => 200,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Bicicleta',
                    'bicicletas' => $bicicletas,
                ];
                return response()->json($response, 200);
            } else {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'El resultado de entrenamiento no existe.',
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
            return response()->json($response, 400);
        }
    }

    public function createBicycleAPI(Request $request)
    {
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:50',
                'tipo' => 'required|string|max:50',
                'comentario' => 'nullable|string|max:255'
            ]);

            $bicicleta = Bicicleta::create($data);

            if ($bicicleta) {
                $response = [
                    'response' => 201,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Se ha creado la bicicleta correctamente.'
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
