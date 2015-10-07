<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Compras', function(Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha');
            $table->float('subTotal');
            $table->float('descuento');
            $table->float('total');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('Cliente');
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
        Schema::drop('Compras');
    }
}
