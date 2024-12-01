<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class LogarController extends Controller
{
    public function consumirConsultarEndereco(Request $request) {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2FkbWluL21hbmFnZS10b2tlbnMvdXBkYXRlIiwiaWF0IjoxNzE2NzMyNzI0LCJleHAiOjE3MTk0MTExMjQsIm5iZiI6MTcxNjczMjcyNCwianRpIjoiTDd1MXUyZFRRazJZc3FWVCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0._DkLQdL0kJYDKE4SA75s2gzPqaAhWteWFhQwnS2Pcqc';
        $cpea = $request->query('cpea');
        $identificador = $request->query('identificador');

        // Verifica se os parâmetros foram fornecidos
    //    if ($cpea && $identificador) { Quando é para fornecer o cpea e o identificador respectivamente
        if ($cpea) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get('http://127.0.0.1:8000/api/consultar-endereco', [
                'cpea' => $cpea,
                //'identificador' => $identificador,
            ]);

            // Verifica se a resposta foi bem-sucedida (código 200)
            if ($response->successful()) {
                return $response->json();
            } elseif ($response->status() === 404) {
                return response()->json(['message' => 'Endereço não encontrado.'], 404);
            } else {
                return response()->json(['message' => 'Erro ao consultar endereço.'], $response->status());
            }
        } else {
            return response()->json(['message' => 'Parâmetros incompletos.'], 400);
        }
    }




}
