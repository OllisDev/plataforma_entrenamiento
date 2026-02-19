<?php

namespace App\Http\Controllers;

use App\Models\BloqueEntrenamiento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BloqueEntrenamientoController extends Controller
{
    public function listBlock(BloqueEntrenamiento $bloque)
    {
        $bloques = $bloque->select('id', 'nombre', 'descripcion', 'tipo', 'duracion_estimada', 'potencia_pct_min', 'potencia_pct_max', 'pulso_reserva_pct', 'comentario')->get();
        return view('bloque', compact('bloques'));
    }

    public function listBlockAPI(BloqueEntrenamiento $bloque)
    {
        try {
            // SELECT nombre, descripcion, tipo, duracion_estimada, potencia_pct_min, potencia_pct_max, pulso_reserva_pct, comentario FROM bloque_entrenamiento
            $bloques = $bloque->select('nombre', 'descripcion', 'tipo', 'duracion_estimada', 'potencia_pct_min', 'potencia_pct_max', 'pulso_reserva_pct', 'comentario')->get();

            if ($bloques) {
                $response = [
                    'response' => 200,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'bloques',
                    'bloques' => $bloques
                ];
                return response()->json($response, 200);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            $response = [
                'response' => 400,
                'success' => false,
                'status' => 'error',
                'message' => 'Formato incorrecto.',
            ];
            return response()->json($response, 400);
        }
    }

    public function listBlockByIdAPI(BloqueEntrenamiento $bloques, $id)
    {
        try {
            // SELECT nombre, descripcion, tipo, duracion_estimada, potencia_pct_min, potencia_pct_max, pulso_reserva_pct, comentario WHERE id=?
            $bloque = $bloques->select('nombre', 'descripcion', 'duracion_estimada', 'potencia_pct_min', 'potencia_pct_max', 'pulso_reserva_pct', 'comentario')->where('id', $id)->first();

            if ($bloque) {
                $response = [
                    'response' => 200,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Bloque',
                    'bloque' => $bloque,
                ];
                return response()->json($response, 200);
            } else {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'El bloque de entrenamiento no existe.',
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

    public function createBlockAPI(Request $request)
    {
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:100',
                'descripcion' => 'required|string|max:255',
                'tipo' => 'required|in:rodaje,intervalos,fuerza,recuperacion,test',
                'duracion_estimada' => 'required|date_format:H:i',
                'potencia_pct_min' => 'required|decimal:2|between:0,999.99',
                'potencia_pct_max' => 'required|decimal:2|between:0,999.99',
                'pulso_pct_max' => 'required|decimal:2|between:0,999.99',
                'pulso_reserva_pct' => 'required|decimal:2|between:0,999.99',
                'comentario' => 'required|string|max:255'
            ]);

            $data['id_ciclista'] = Auth::id();
            // INSERT INTO bloque_entrenamiento (nombre, descripcion, tipo, duracion_estimada, potencia_pct_min, potencia_pct_max, pulso_pct_max, pulso_reserva_pct, comentario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            $bloque = BloqueEntrenamiento::create($data);

            if ($bloque) {
                $response = [
                    'response' => 201,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'El bloque de entrenamiento ha sido creado correctamente.'
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

    public function deleteBlockAPI($id)
    {
        try {
            $bloque = BloqueEntrenamiento::where('id', $id)->first();

            if (!$bloque) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'El bloque de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }

            $bloque->delete();

            $response = [
                'response' => 200,
                'success' => false,
                'status' => 'ok',
                'message' => 'El bloque de entrenamiento se ha eliminado correctamente.'
            ];
            return response()->json($response, 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            $response = [
                'response' => 400,
                'success' => false,
                'status' => 'error',
                'message' => 'Formato incorrecto'
            ];
            return response()->json($response, 400);
        }
    }
}
