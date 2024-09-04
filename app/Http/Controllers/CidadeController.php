<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    public function cidade(Request $request)
    {
        $estadoId = $request->query('estado_id');
        $cidades = Cidade::where('estado_id', $estadoId)->get();
        return response()->json($cidades);
    }

}
