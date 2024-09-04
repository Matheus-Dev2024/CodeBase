<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
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
        $usuarios = DB::table('usuarios AS u')
            ->select(
                'u.id',
                'u.nome AS nome_usuario',
                'u.idade',
                'u.nascimento',
                'c.nome AS cargo',
                'g.nome AS genero',
                'ci.nome AS cidade',
                'e.nome AS estado',
                'l.nome AS lotacao'
            )
            ->join('cargos AS c', 'c.id', '=', 'u.cargo_id')
            ->join('generos AS g', 'g.id', '=', 'u.genero_id')
            ->join('cidades AS ci', 'ci.id', '=', 'u.cidade_id')
            ->join('estados AS e', 'e.id', '=', 'ci.estado_id')
            ->join('lotacoes AS l', 'l.id', '=', 'u.lotacao_id')
            ->get();

        return response()->json($usuarios);
    }

    public function cadastro(): Factory|Application|View
    {
        return view('cadastro');
    }

    public function edit($id): Factory|View|Application
    {
        $usuario = Usuarios::findOrFail($id);
        return view('editUser', compact('usuario'));
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'nascimento' => 'required|date',
            'cargo_id' => 'required|integer',
            'genero_id' => 'required|integer',
            'cidade_id' => 'required|integer',
            'lotacao_id' => 'required|integer',
        ]);

        $usuario = Usuarios::findOrFail($id);
        $usuario->update($validatedData);

        return response()->json(['message' => 'Dados atualizados com sucesso']);
    }

    public function destroy($id): JsonResponse
    {
        $usuario = Usuarios::find($id);

        if ($usuario) {
            $usuario->delete();
            return response()->json(['message' => 'Usuário deletado com sucesso']);
        } else {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    }

}
