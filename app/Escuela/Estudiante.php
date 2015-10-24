<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function scopeName($query, $name){

    	if (trim($name) != "")
    	{
    		return $query->where(DB::raw("CONCAT(nombre_estudiante, ' ' , apellido_estudiante) "),"LIKE","%$name%");	
    	}
    }

    public function scopeCode($query, $code){

    	if (trim($code) != "")
    	{
    		return $query->where("codigo","LIKE","%$code%");	
    	}
    }
}
