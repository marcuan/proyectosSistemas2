<?php

namespace RED\Restaurante;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
	protected $table = 'Temporada';
	
    public function platillos()
    {
    	return $this->hasMany('RED\Platillo','temporada_id'); 
	}
	

}
