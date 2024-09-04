<?php

namespace App\Http\Controllers;

use App\Models\Lotacao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LotacaoController extends Controller
{
    public function index(): JsonResponse
    {
        $lotacao = Lotacao::orderBY('nome', 'asc')->get();
        return response()->json($lotacao);
    }
}
