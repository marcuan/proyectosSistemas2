<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalleventa';
    protected $fillable = [
	'temporada_id',
	'nombre',
	'cantidad',
	'total',
	'tiendaorestaurante'
	];

	

}