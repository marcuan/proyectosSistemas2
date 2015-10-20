<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    protected $table = 'Curso';

    protected $fillable = [
    'codigo',
    'nombre_curso',
    'descripcion',
    'fecha_inicio',
    'fecha_fin',
    'max_estudiantes',
    'num_estudiantes',
    'activo'];

    public function estudiantes()
    {
        return $this->belongsToMany('App\Escuela\Estudiante');
    }

    public function maestros()
    {
        return $this->belongsToMany('App\Escuela\Maestro');
    }
}
