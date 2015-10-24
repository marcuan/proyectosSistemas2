<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'Clientes';

    protected $fillable = [
    'nombre',
    'nit',
    'telefono',
    'dirección'];

    public function scopeName($query, $name)
    {
        if ($name != "") {
            # code...
            $query->where('nombre', $name);
        }
        
    }
}
