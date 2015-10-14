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
             $table->string('nombre');
            $table->string('descripcion');  
		  $table->integer('empleado_id')->unsigned();
		  $table->foreign('empleado_id')->references('id')->on('Empleado');
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
