<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Consignacion', function(Blueprint $table) {
            $table->increments('id');
			 	 $table->string('codigo');
                 $table->date('fechaInicial');
			 	 $table->date('fechaFinal');
                 $table->string('detalleConsignacion');
			 
                 //Campo para llave foranea
                 $table->integer('proveedores_id')->unsigned();
                 //Referenciando la llave foranea con la otra tabla Proveedores
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
        Schema::drop('Consignacion');
    }
}
