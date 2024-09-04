<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalvarDadosController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            $dados = Usuarios::create($request->all());
            return response()->json([
                'message' => 'Dados salvos com sucesso!',
                'dado' => $dados
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao salvar dados.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
