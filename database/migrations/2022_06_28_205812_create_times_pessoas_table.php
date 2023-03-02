<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesPessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times_pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('capitao')->nullable();
            $table->string('lider')->nullable();
            $table->string('goleiro')->nullable();
            $table->bigInteger('times_id')
                  ->unsigned();
            $table->foreign('times_id')
                  ->references('id')
                  ->on('times')
                  ->onDelete('cascade');
            $table->bigInteger('pessoas_id')
                  ->unsigned();
            $table->foreign('pessoas_id')
                  ->references('id')
                  ->on('pessoas')
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
        Schema::dropIfExists('times_pessoas');
    }
}
