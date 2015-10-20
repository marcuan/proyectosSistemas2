<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Estudiante', function(Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre_estudiante');
            $table->string('apellido_estudiante');
            $table->date('fecha_nacimiento');
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
        Schema::drop('Estudiante');
    }
}
