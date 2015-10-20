<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    
    protected $fillable = [
    	'nombre_maestro',
    	'apellido_maestro', 
    	'fecha_maestro',
    	'direccion',
    	'correo',
    	'genero_id'
    	];

    public function telefonos()
    {
        return $this->hasMany('App\Escuela\Telefono');
    }

    public function cursos()
    {
        return $this->belongsToMany('App\Escuela\Curso');
    }
}
