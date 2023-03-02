<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_completo');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cpf')->unique();
            $table->string('data_nasc');
            $table->string('sexo');
            $table->string('celular');
            $table->string('email')->nullable();
            $table->string('idade');
            $table->string('img')->nullable();
            $table->string('funcao');
            $table->bigInteger('delegacoes_id')
                  ->unsigned();
            $table->foreign('delegacoes_id')
                  ->references('id')
                  ->on('delegacoes')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('pessoas');
    }
}
