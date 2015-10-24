<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    protected $table = 'Platillos';      
    //Agregando atributos necesarios para modelos
    protected $fillable=[
    	'temporada_id',
    	'nombre',
    	'precio',
    	'descripcion'
    ];
}
