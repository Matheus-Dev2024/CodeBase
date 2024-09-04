<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function lista(): Factory|Application|View
    {
        return view('lista_usuarios');
    }

    public function grid(): JsonResponse
    {
        $usuarios = DB::table('usuarios as u')
            ->join('cargos as c', 'c.id', '=', 'u.cargo_id')
            ->join('generos as g', 'g.id', '=', 'u.genero_id')
            ->join('cidades as ci', 'ci.id', '=', 'u.cidade_id')
            ->join('estados as e', 'e.id', '=', 'ci.estado_id')
            ->join('lotacoes as l', 'l.id', '=', 'u.lotacao_id')
            ->get([
                'u.id',
                'u.nome as nome_usuario',
                'u.idade',
                'u.nascimento',
                'c.nome as cargo',
                'g.nome as genero',
                'ci.nome as cidade',
                'e.nome as estado',
                'l.nome as lotacao'
            ]);


        return response()->json($usuarios);
    }

    public function cadastro(): Factory|Application|View
    {
        return view('cadastro');
    }
}
