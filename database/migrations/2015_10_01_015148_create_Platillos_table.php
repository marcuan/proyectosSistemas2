<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatillosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Platillos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('temporada_id')->unsigned();
		    $table->foreign('temporada_id')->references('id')->on('Temporada');
            $table->integer('cantidad');
            $table->string('tipo');
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
        Schema::drop('Platillos');
    }
}
