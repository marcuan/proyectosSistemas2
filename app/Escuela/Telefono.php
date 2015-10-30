<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'Telefono';
    protected $fillable = ['numero_telefono, estudiante_id, maestro_id'];
}
