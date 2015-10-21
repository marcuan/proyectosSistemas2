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
}
