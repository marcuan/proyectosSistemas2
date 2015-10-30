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
            $table->date('fecha');
            $table->float('subTotal');
            $table->float('descuento');
            $table->float('total');
		    $table->integer('proveedores_id')->unsigned();
            $table->foreign('proveedores_id')->references('id')->on('Proveedores');
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
