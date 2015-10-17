<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Horario', function(Blueprint $table) {
            $table->increments('id');
               $table->string('dia');
            $table->string('horaInicio');
            $table->string('horaFin');
		  
		  $table->integer('curso_id')->unsigned();
		  $table->foreign('curso_id')->references('id')->on('Curso');
		  
		  $table->integer('asignacion_id')->unsigned();
		  $table->foreign('asignacion_id')->references('id')->on('Asignacion');
		  
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
        Schema::drop('Horario');
    }
}
