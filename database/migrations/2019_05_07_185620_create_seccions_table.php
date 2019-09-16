<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomsecc');

            $table->unsignedBigInteger('idgrado');
            $table->foreign('idgrado')->references('id')->on('grados');

            $table->integer('capacidad');
            $table->string('descripcionseccion');
            $table->string('turno');

            $table->unsignedBigInteger('idperiodo');
            $table->foreign('idperiodo')->references('id')->on('periodo_academicos');

            $table->unsignedBigInteger('idprofesor');
            $table->foreign('idprofesor')->references('id')->on('profesors');
            
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
        Schema::dropIfExists('seccions');
    }
}
