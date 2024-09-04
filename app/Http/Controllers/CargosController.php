<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function cargos(): JsonResponse
    {
        $cargos = Cargo::all();
        return response()->json($cargos);
    }
}
