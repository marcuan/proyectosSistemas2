<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    
    protected $table = 'Maestro';

    protected $fillable = [
        'codigo',
    	'nombre_maestro',
    	'apellido_maestro', 
    	'fecha_nacimiento',
    	'direccion',
    	'correo',
        'activo',
    	'genero_id'];

    public function telefonos()
    {
        return $this->hasMany('RED\Escuela\Telefono');
    }

    public function cursos()
    {
        return $this->belongsToMany('RED\Escuela\Curso');
    }
}
