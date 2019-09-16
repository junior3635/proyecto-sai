<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigoinscripcion')->unique();
            $table->date('fecha');
            $table->unsignedBigInteger('idseccion');
            $table->foreign('idseccion')->references('id')->on('seccions');
            $table->unsignedBigInteger('idalum');
            $table->foreign('idalum')->references('id')->on('alumnos');
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
        Schema::dropIfExists('inscripcions');
    }
}
