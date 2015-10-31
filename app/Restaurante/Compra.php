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
}
