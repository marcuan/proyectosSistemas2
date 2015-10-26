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
            $table->increments('idProducto');
                $table->string('nombreProducto');
                $table->string('detalleProducto');
                $table->float('precioVenta');
                $table->integer('existencia');
                $table->float('comision');
                
                //Campo para llave foranea
                  $table->integer('consignacion_id')->unsigned();
                 
                  $table->foreign('consignacion_id')->references('id')->on('Consignacion');
                 
                 
                //$table->float('total');
                //$table->integer('cantidad');
                $table->integer('tiendaorestaurante');
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
