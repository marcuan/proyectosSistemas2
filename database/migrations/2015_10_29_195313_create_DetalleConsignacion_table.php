<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleConsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetalleConsignacion', function (Blueprint $table) {
            $table->increments('id');
			
			      //Campo para llave foranea consignacion
                 $table->integer('consignacion_id')->unsigned();
                 //Referenciando la llave foranea con la otra tabla Proveedores
                 $table->foreign('consignacion_id')->references('id')->on('Consignacion');
				 $table->integer('cantidad');
				 $table->float('precio');
            
			      //Campo para llave foranea
              $table->integer('producto_id')->unsigned();
                 //Referenciando la llave foranea con la otra tabla 
              $table->foreign('producto_id')->references('id')->on('Productos');
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
        Schema::drop('DetalleConsignacion');
    }
}
