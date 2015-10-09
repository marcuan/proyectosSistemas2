<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Asignacion', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estudiantes_id')->unsigned();
            $table->foreign('estudiantes_id')->reference('id')->on('Estudiantes');
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
        Schema::drop('Asignacion');
    }
}
