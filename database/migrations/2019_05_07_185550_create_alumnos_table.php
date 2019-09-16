<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idpersona');
            $table->foreign('idpersona')->references('id')->on('personas');
            $table->string('condicionalum')->nullable();
            $table->string('procedenciaalum')->nullable();
            $table->unsignedBigInteger('idrepresentante');
            $table->foreign('idrepresentante')->references('id')->on('representantes');
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
        Schema::dropIfExists('alumnos');
    }
}
