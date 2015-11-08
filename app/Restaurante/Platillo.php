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

    public function temporada(){
        return $this->belongsTo('RED\Restaurante\Temporada');
        
        
    }

    public function scopeName($query, $name)
    {
    	if(trim($name)!="")
    	{
    		#code...
            
            return $query->where("nombre","LIKE","%$name%");  
    		//$query->where(\DB::raw("CONCAT(nombre)"), "LIKE", "%$name%");
    	}
    }

    public function scopeTemporada($query, $type)
    {
        if(trim($type)!="")
        {
            #code...
            return $query->where("temporada_id","LIKE","%$type%");
            //$query->where(\DB::raw("CONCAT(temporada)"), "LIKE", "%$season%");
        }
    }


    
}
