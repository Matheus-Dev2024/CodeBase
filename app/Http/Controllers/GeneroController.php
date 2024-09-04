<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
   public function genero(): JsonResponse
   {
       $generos = Genero::all();
       return response()->json($generos);
   }
}
