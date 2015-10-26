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
		'detalleProducto',
		'existencia',
		'comision'
		];
	
	 public function scopeName($query, $name)
    {
    	if(trim($name)!="")
    	{
    		#code...
    		$query->where(\DB::raw("CONCAT(nombreProducto)"), "LIKE", "%$name%");
    	}
    }
}
