<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

    public function estudiantes()
    {
        return $this->belongsToMany('RED\Escuela\Estudiante');
    }

    public function maestros()
    {
        return $this->belongsToMany('RED\Escuela\Maestro');
    }
}
