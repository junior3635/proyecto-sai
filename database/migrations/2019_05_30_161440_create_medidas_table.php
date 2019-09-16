<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idalumno');
            $table->foreign('idalumno')->references('id')->on('alumnos');
            $table->double('pesoalum')->nullable();
            $table->double('estaturaalum')->nullable();
            $table->integer('tallcamalum')->nullable();
            $table->integer('tallpantalum')->nullable();
            $table->integer('tallzapalum')->nullable();
            $table->integer('circunferenciadebrazo')->nullable();
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
        Schema::dropIfExists('medidas');
    }
}
