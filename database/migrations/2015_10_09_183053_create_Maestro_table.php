<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Maestro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre_maestro');
            $table->string('apellido_maestro');
            $table->dateTime('fecha_nacimiento');
            $table->string('direccion');
            $table->string('correo');
            $table->boolean('activo');
            $table->timestamps();


            $table->integer('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('genero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Maestro');
    }
}
