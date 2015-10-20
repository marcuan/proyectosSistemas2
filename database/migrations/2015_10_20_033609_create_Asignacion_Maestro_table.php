<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionMaestroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Asignacion_Maestro', function ($table) {
            $table->increments('id');
            $table->integer('id_curso');
            $table->integer('id_maestro');
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
        Schema::drop('Asignacion_Maestro');
    }
}
