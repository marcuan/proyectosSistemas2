<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('DetalleVenta', function(Blueprint $table) {
            $table->increments('id');
                    $table->float('total');
                $table->integer('cantidad');
                $table->integer('tiendaorestaurante');
                
             //Campo para llave foranea
                $table->integer('venta_id')->unsigned();
                //Referenciando la llave foranea con la otra tabla 
                $table->foreign('venta_id')->references('id')->on('Venta');
                 
                 //Campo para llave foranea
              $table->integer('producto_id')->unsigned();
                 //Referenciando la llave foranea con la otra tabla 
              $table->foreign('producto_id')->references('id')->on('Productos');
                // $this->hasOne('DetalleVenta','idDetalleVenta','id');
                 //$table->hasOne('Producto', 'idDetalleVenta');
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
        Schema::drop('DetalleVenta');
    }
}
