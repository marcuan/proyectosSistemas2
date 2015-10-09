<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HorariosCursos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('dia');
            $table->string('horaInicio');
            $table->string('horaFin');
            $table->integer('id_cursos');
            $table->foreign('id')->reference('id')->on('Cursos');
            $table->integer('id_asgignaciones');
            $table->foreign('id')->reference('id')->on('Asignaciones');
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
        Schema::drop('HorariosCursos');
    }
}
