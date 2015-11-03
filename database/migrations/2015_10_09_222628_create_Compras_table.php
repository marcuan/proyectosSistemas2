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
            $table->decimal('subTotal', 10, 2);
            $table->decimal('descuento', 10, 2);
		    $table->decimal('total', 10, 2);
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
