<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function estado(): JsonResponse
    {
        $estados = Estado::orderBy('nome', 'asc')->get();
        return response()->json($estados);
    }
}
