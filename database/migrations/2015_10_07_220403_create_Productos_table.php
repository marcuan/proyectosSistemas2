<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Productos', function(Blueprint $table) {
            $table->increments('id');
			    $table->string('codigo');
                $table->string('nombreProducto');
                $table->string('detalleProducto');
                $table->float('precioVenta');
                $table->integer('existencia');
                $table->float('comision');
				$table->boolean('estado')->default('0');
                 
                //$table->float('total');
                //$table->integer('cantidad');
                //$table->integer('tiendaorestaurante');
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
        Schema::drop('Productos');
    }
}
