<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class DetalleVentum extends Model
{
    protected $table = 'DetalleVenta';
    
     protected $fillable = [
    'id',
    'total',
    'cantidad',
    'tiendaorestaurante',
    'venta_id',
    'producto_id',
    'platillo_id'];

    protected $dates = ['deleted_at'];

    
    public function detalleVentas()
    {
        return $this->hasMany('RED\Despensa\DetalleVentum');
    }

    public function scopeDetalle($query, $name){

        if (trim($name) != "")
        {
            return $query->where("venta_id","LIKE","%$name%");    
        }
    }

    public function scopeId($query, $code){

        if (trim($code) != "")
        {
            return $query->where("id","LIKE","%$code%");    
        }
    }
}
