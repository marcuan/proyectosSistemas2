<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Consignacion extends Model
{
    
    protected $table = 'Consignacion';

    protected $fillable = [
		'codigo',
    	'fechaInicial',
    	'fechaFinal',
    	'detalleConsignacion', //servira escribir un pequeño detalle de la consignacion que se hace
    	'proveedores_id'

    ];
	
	public function verConsignacion(){
    

    return DB::select($rawQuery);   
}
	public function detalles()
    {
    	return $this->hasMany('RED\Despensa\DetalleConsignacion','consignacion_id'); 
	}

	   public function dconsignacion()
    {
        return $this->belongsToMany('RED\Despensa\DetalleConsignacion');
    }
    public function scopeCode($query, $code){

        if ($code != "")
        {
            return $query->where("codigo","LIKE","%$code%");    
        }
    }
}
