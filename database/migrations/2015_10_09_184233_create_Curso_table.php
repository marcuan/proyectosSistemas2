<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Curso', function(Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre_curso');
            $table->string('descripcion');
            $table->integer('max_estudiantes');    
            $table->integer('num_estudiantes');  

		    $table->integer('maestro_id')->unsigned();
		    $table->foreign('maestro_id')->references('id')->on('Maestro');
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
        Schema::drop('Curso');
    }
}
