<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',255);
            $table->string('sigla',2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
