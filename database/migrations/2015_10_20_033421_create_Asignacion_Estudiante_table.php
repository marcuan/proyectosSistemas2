<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Curso_Estudiante', function ($table) {
            $table->increments('id');
            $table->integer('curso_id');
            $table->integer('estudiante_id');
            $table->dateTime('fecha_asignacion');
            $table->boolean('activo');
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
        Schema::drop('Curso_Estudiante');
    }
}
