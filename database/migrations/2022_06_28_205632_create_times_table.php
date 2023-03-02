<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('medalha')->nullable();
            $table->bigInteger('categorias_id')
                  ->unsigned();
            $table->foreign('categorias_id')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('times');
    }
}
