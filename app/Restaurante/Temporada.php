<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
	protected $table = 'Temporada';
	protected $fillable = [
		'nombre'
	
		];
	
    public function platillos()
    {
    	return $this->hasMany('RED\Restaurante\Platillo','temporada_id'); 
	}
	
	public function scopeName($query, $name)
    {
        if (trim($name) != "") {
            # code...
            $query->where(\DB::raw("CONCAT(nombre)"), "LIKE", "%$name%");
        }
        
    }

}
