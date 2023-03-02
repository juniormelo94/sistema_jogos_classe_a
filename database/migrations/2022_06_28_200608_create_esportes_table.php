<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esportes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('img');
            $table->string('regras');
            $table->string('turno');
            $table->string('qtd_pessoas_min');
            $table->string('qtd_pessoas_max');
            $table->string('responsavel');
            $table->string('img_responsavel');
            $table->string('celular_responsavel');
            $table->string('url_whats_responsavel');
            $table->string('url_insta_responsavel');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esportes');
    }
}
