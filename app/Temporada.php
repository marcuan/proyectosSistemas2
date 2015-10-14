<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
	protected $table = 'Temporada';
	
    public function platillos()
    {
    	return $this->hasMany('App\Platillo','temporada_id'); 
	}
	

}
