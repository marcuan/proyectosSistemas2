<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    protected $table = 'Productos';
    	protected $fillable = [
        'codigo',
		'nombreProducto',
		'detalleProducto',
		'precioVenta',
		'existencia',
		'comision',
        'estado'
		];
	
	 public function scopeName($query, $name)
    {
    	if(trim($name)!="")
    	{
    		#code...
    		$query->where(\DB::raw("CONCAT(nombreProducto)"), "LIKE", "%$name%");
    	}
    }
    public function scopeCode($query, $code){

        if ($code != "")
        {
            return $query->where("codigo","LIKE","%$code%");    
        }
    }
    public function scopeActive($query, $active){

        if ($active != "")
        {
            return $query->where("estado", $active);    
        }
    }
}
