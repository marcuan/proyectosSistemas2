<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{

	protected $table = 'Estudiante';

	protected $fillable = [
		'codigo',
		'nombre_estudiante',
		'apellido_estudiante',
		'fecha_nacimiento',
		'direccion',
		'correo',
		'genero_id'
		];

    public function telefonos()
    {
        return $this->hasMany('RED\Escuela\Telefono');
    }

    public function cursos()
    {
        return $this->belongsToMany('RED\Escuela\Curso');
    }
}
