<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public function telefonos()
    {
        return $this->hasMany('App\Telefono');
    }
}
