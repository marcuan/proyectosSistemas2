<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function scopeName($query, $name){

        if (trim($name) != "")
        {
            return $query->where(DB::raw("CONCAT(nombre_maestro, ' ' , apellido_maestro) "),"LIKE","%$name%");    
        }
    }

    public function scopeCode($query, $code){

        if (trim($code) != "")
        {
            return $query->where("codigo","LIKE","%$code%");    
        }
    }
}
