<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'DetalleCompras';
    protected $fillable = [
	'materia_prima_id',
	'compras_id',
	'cantidad',
	'costo'
	];
	
    public function compra()
    {
    	return $this->hasMany('RED\Compra','compras_id'); 
	}

	

}
