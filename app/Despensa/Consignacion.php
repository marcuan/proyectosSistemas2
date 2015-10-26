<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class Consignacion extends Model
{
    //
    protected $table = 'Consignacion';

    protected $fillable = [
    	'fechaInicial',
    	'fechaFinal',
    	'detalleConsignacion',
    	'proveedores_id'

    ];
}
