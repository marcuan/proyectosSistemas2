<?php

namespace RED\Ong;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
	use SoftDeletes;

	protected $table = 'Donation';
	
	protected $fillable = [
		'id_donation',
		'id_donor',
		'monto',
		'descripcion'
		];

    public function scopeCode($query, $code){

        if (trim($code) != "")
        {
            return $query->where("created_at","LIKE","%$code%");    
        }
    }
}