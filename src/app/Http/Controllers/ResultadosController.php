<?php

namespace App\Http\Controllers;

use App\Models\Entrenamiento;
use Illuminate\Http\Request;

class ResultadosController extends Controller
{

    public function listResultByCiclistaAPI(Request $request, Entrenamiento $entrenamiento, $ciclistaId)
    {
        try {
            $offset = $request->query('offset', 0);
            $limit = $request->query('limit', 10);
            $resultados = $entrenamiento->join('ciclista', 'entrenamiento.id_ciclista', '=', 'ciclista.id')
                ->select(
                    'entrenamiento.id',
                    'entrenamiento.fecha',
                    'entrenamiento.duracion',
                    'entrenamiento.kilometros',
                    'entrenamiento.recorrido',
                    'entrenamiento.pulso_medio',
                    'entrenamiento.pulso_max',
                    'entrenamiento.potencia_media',
                    'entrenamiento.potencia_normalizada',
                    'entrenamiento.velocidad_media',
                    'entrenamiento.puntos_estres_tss',
                    'entrenamiento.factor_intensidad_if',
                    'entrenamiento.ascenso_metros',
                    'entrenamiento.comentario',
                    'ciclista.nombre as nombre_ciclista',
                    'ciclista.apellidos as apellidos_ciclista'
                )
                ->where('entrenamiento.id_ciclista', $ciclistaId)
                ->orderBy('id', 'desc')
                ->skip($offset)
                ->take($limit)
                ->get();

            $response = [
                'response' => 200,
                'success' => true,
                'status' => 'ok',
                'message' => 'Resultados del ciclista',
                'resultados' => $resultados,
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

    public function listResultAPI(Entrenamiento $entrenamiento)
    {
        try {
            $resultados = $entrenamiento->select('id_ciclista', 'id_bicicleta', 'id_sesion', 'id', 'fecha', 'duracion', 'kilometros', 'recorrido', 'pulso_medio', 'pulso_max', 'potencia_media', 'potencia_normalizada', 'velocidad_media', 'puntos_estres_tss', 'factor_intensidad_if', 'ascenso_metros', 'comentario')->get();

            if ($resultados) {
                $response = [
                    'response' => 200,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Resultado',
                    'resultados' => $resultados,
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
    public function listResultByIdAPI(Entrenamiento $entrenamiento, $id)
    {
        try {
            $resultado = $entrenamiento->select('id_ciclista', 'id_bicicleta', 'id_sesion', 'id', 'fecha', 'duracion', 'kilometros', 'recorrido', 'pulso_medio', 'pulso_max', 'potencia_media', 'potencia_normalizada', 'velocidad_media', 'puntos_estres_tss', 'factor_intensidad_if', 'ascenso_metros', 'comentario')->where('id', $id)->first();

            if ($resultado) {
                $response = [
                    'response' => 200,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Resultado',
                    'resultado' => $resultado,
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

    public function createResultAPI(Request $request)
    {
        try {

            $data = $request->validate([
                'id_ciclista' => 'required|exists:ciclista,id',
                'id_bicicleta' => 'required|exists:bicicleta,id',
                'id_sesion' => 'nullable|exists:sesion_entrenamiento,id',
                'fecha' => 'required|date',
                'duracion' => 'required|date_format:H:i:s',
                'kilometros' => 'required|numeric',
                'recorrido' => 'required|string|max:150',
                'pulso_medio' => 'nullable|integer',
                'pulso_max' => 'nullable|integer',
                'potencia_media' => 'nullable|integer',
                'potencia_normalizada' => 'required|integer',
                'velocidad_media' => 'required|numeric',
                'puntos_estres_tss' => 'nullable|numeric',
                'factor_intensidad_if' => 'nullable|numeric',
                'ascenso_metros' => 'nullable|integer',
                'comentario' => 'nullable|string|max:255',
            ]);

            $resultado = Entrenamiento::create($data);

            if ($resultado) {
                $response = [
                    'response' => 201,
                    'success' => true,
                    'status' => 'ok',
                    'message' => 'Se ha creado el resultado de entrenamiento correctamente.'
                ];
                return response()->json($response, 201);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            if (isset($e->validator->failed()['id_ciclista']['Exists'])) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'El ciclista no existe.'
                ];
                return response()->json($response, 404);
            }

            if (isset($e->validator->failed()['id_bicicleta']['Exists'])) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'La bicicleta no existe.'
                ];
                return response()->json($response, 404);
            }

            if (isset($e->validator->failed()['id_sesion']['Exists'])) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'La sesión de entrenamiento no existe.'
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

    public function deleteResultAPI($id)
    {
        try {

            $resultado = Entrenamiento::where('id', $id)->first();

            if (!$resultado) {
                $response = [
                    'response' => 404,
                    'success' => false,
                    'status' => 'error',
                    'message' => 'El resultado de entrenamiento no existe.'
                ];
                return response()->json($response, 404);
            }

            $resultado->delete();

            $response = [
                'response' => 200,
                'success' => true,
                'status' => 'ok',
                'message' => 'El resultado de entrenamiento se ha eliminada correctamente.'
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
