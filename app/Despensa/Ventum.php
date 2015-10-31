<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class Ventum extends Model
{
    protected $table = 'Venta';

    protected $fillable = [
    'id',
    'clientes_id',
    'fechaVenta',
    'total',
    'subtotal',
    'anulado'];

    protected $dates = ['deleted_at'];

    
    public function ventass()
    {
        return $this->hasMany('RED\Despensa\Ventum');
    }

    public function scopeClient($query, $name){

        if (trim($name) != "")
        {
            return $query->where("clientes_id","LIKE","%$name%");    
        }
    }
    
    public function scopeCode($query, $type){

        if (trim($type) != "")
        {
            return $query->where("id","LIKE","%$type%");    
        }
    }
    
    public function scopeFecha($query, $fecha){

        if (trim($fecha) != "")
        {
            return $query->where("fechaVenta","LIKE","%$fecha%");    
        }
    }

    public function scopeId($query, $code){

        if (trim($code) != "")
        {
            return $query->where("id","LIKE","%$code%");    
        }
    }
    
    public function scopeName($query, $name)
    {
        if (trim($name) != "") {
            # code...
            return $query->where("id","LIKE","%$name%");
        }
        
    }
    
            public function scopeDate($query, $date)
    {
        if (trim($date) != "") {
            # code...
            $query->where("fechaVenta","LIKE","%$date%");
        }
        
    }
    
        public function scopeAnular($query, $id)
    {
        if (trim($name) != "") {
            # code...
            return $query->where("id","LIKE","%$name%");
        }
        
    }
}
