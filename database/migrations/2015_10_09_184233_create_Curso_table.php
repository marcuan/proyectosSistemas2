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
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('max_estudiantes');    
            $table->integer('num_estudiantes');
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
        Schema::drop('Curso');
    }
}
