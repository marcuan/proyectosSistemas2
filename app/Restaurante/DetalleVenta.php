<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalleventa';
    protected $fillable = [
	'total',
	'cantidad',
	'tiendaorestaurante',
	'venta_id',
	'producto_id',
	'platillo_id',
	];

	

}