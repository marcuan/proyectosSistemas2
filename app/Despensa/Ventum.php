<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class Ventum extends Model
{
    protected $table = 'Venta';

    protected $fillable = [
    'id',
    'fechaVenta',
    'descuento',
    'subtotal',
    'total',
    'anulado',
    'clientes_id'];

       protected $dates = ['deleted_at'];

    
    public function ventas()
    {
        return $this->hasMany('RED\Despensa\Ventum');
    }

    public function scopeClient($query, $name){

        if (trim($name) != "")
        {
            return $query->where("clientes_id","LIKE","%$name%");    
        }
    }

    public function scopeId($query, $code){

        if (trim($code) != "")
        {
            return $query->where("id","LIKE","%$code%");    
        }
    }
    
    public function compra()
    {
        return $this->hasMany('RED\Restaurante\Compra','proveedores_id'); 
    }
}
