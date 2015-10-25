<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Venta', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('clientes_id')->unsigned();                           //kkjkukj
            $table->foreign('clientes_id')->references('id')->on('Clientes');    //oiwjdfklajsdfkjasdf
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
        Schema::drop('Venta');
    }
}
