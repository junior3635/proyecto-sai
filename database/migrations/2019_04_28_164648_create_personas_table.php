<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('lugnacimiento');
            $table->date('fechnacimiento');
            $table->string('sexo');
            $table->bigInteger('telefono');
            $table->bigInteger('celular');
            $table->string('direccion');
            $table->string('correo');
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
        Schema::dropIfExists('personas');
    }
}
