<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //Agregando atributo necesario para los modelos
    	 protected $table = 'Compras';
    	 protected $fillable = [
		'fecha',
		'subTotal',
		'descuento',
		'total',
		'proveedores_id'
		];
}
