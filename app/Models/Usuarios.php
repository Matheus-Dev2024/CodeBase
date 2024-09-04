<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $fillable = [
        'nome', 'nascimento', 'idade',
        'genero_id', 'cargo_id', 'lotacao_id',
        'estado_id', 'cidade_id'
    ];

    public $timestamps = false;

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    public function lotacao()
    {
        return $this->belongsTo(Lotacao::class, 'lotacao_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    /**
     * Create a new user and handle any potential errors.
     *
     * @param array $data
     * @return \App\Models\Usuarios|JsonResponse
     */
    public static function safeCreate(array $data)
    {
        try {
            return self::create($data);
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return response()->json(['error' => 'Error creating user'], 500);
        }
    }
}
