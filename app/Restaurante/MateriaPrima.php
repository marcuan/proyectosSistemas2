<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
 
{
	 protected $table = 'MateriaPrima';
    	protected $fillable = [
		'nombre',
		'existencia',
		'precio'
		];
	public function detallecompra()
	{
     return $this->hasMany('RED\Restaurante\DetalleCompra','materia_prima_id');	 
	}

}
