<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogosCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogos_categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('times_1');
            $table->string('placar_1')->nullable();
            $table->string('times_2');
            $table->string('placar_2')->nullable();
            $table->string('fase');
            $table->bigInteger('categorias_id')
                  ->unsigned();
            $table->foreign('categorias_id')
                  ->references('id')
                  ->on('categorias')
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
        Schema::dropIfExists('jogos_categorias');
    }
}
