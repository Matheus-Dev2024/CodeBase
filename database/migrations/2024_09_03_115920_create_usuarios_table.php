<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('nascimento');
            $table->integer('idade');

            $table->unsignedBigInteger('genero_id');
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedBigInteger('lotacao_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('cidade_id');

            // Explicitly defining foreign key constraints
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->foreign('lotacao_id')->references('id')->on('lotacoes')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
