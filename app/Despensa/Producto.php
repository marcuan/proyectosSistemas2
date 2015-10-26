<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Productos';
    	protected $fillable = [
		'nombreProducto',
		'detalleProducto',
		'precioVenta',
		'existencia',
		'comision'
		];
}
