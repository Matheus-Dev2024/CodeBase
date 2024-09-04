<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_lotacoes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotacoesTable extends Migration
{
    public function up()
    {
        Schema::create('lotacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lotacoes');
    }
}
