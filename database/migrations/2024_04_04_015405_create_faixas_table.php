<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaixasTable extends Migration
{
    public function up()
    {
        Schema::create('faixas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('duracao');
            // Adicione outras colunas conforme necessário
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faixas');
    }
}
