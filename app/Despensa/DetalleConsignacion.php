<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class DetalleConsignacion extends Model
{
   protected $table = 'DetalleConsignacion';
    protected $fillable = [
	'consignacion_id',
	'producto_id',
	'cantidad',
	'costo'
	];
	
    public function consignacion()
    {
    	return $this->hasMany('RED\Consignacion','consignacion_id'); 
	}

}
