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
	public function detalles()
    {
    	return $this->hasMany('RED\Restaurante\DetalleCompra','compras_id'); 
	}

	public function dcompras()
    {
        return $this->belongsTo('RED\Restaurante\DetalleCompra');
    }
    public function proveedores()
    {
        return $this->belongsTo('RED\Despensa\Proveedore');
    }
    public function scopeFecha($query, $fecha)
    {
        if (trim($fecha) != "")
        {
            return $query->where("fecha","LIKE","%$fecha%");    
        }
    }
        public function scopeId($query, $code)
    {
        if (trim($code) != "")
        {
              return $query->where("id","LIKE","%$code%");    
        }


    }
    public function scopeCode($query, $type)
    {
        if (trim($type) != "")
        {
            return $query->where("id","LIKE","%$type%");    
        }
    }
}
