<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    
    protected $fillable = ['nombre_maestro', 'nombre_maestro', 'fecha_nacimiento','direccion','correo','genero_id'];

    public function telefonos()
    {
        return $this->hasMany('App\Escuela\Telefono');
    }
}
