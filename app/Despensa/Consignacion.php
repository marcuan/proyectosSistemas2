<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class Consignacion extends Model
{
    
    protected $table = 'Consignacion';

    protected $fillable = [
    	'fechaInicial',
    	'fechaFinal',
    	'detalleConsignacion', //servira escribir un pequeño detalle de la consignacion que se hace
    	'proveedores_id'

    ];
}
