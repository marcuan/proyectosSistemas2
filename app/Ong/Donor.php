<?php

namespace RED\Ong;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use SoftDeletes;
    
    protected $table = 'Donor';

    protected $fillable = [
        'id_donor',
    	'donor_name',
    	'donor_lastname', 
    	'adress',
    	'e_mail',
        'active',];

    protected $dates = ['deleted_at'];

    public function donations()
    {
        return $this->hasMany('RED\Ong\Donation');
    }

    public function scopeName($query, $name){

        if (trim($name) != "")
        {
            return $query->where(DB::raw("CONCAT(donor_name, ' ' , donor_lastname) "),"LIKE","%$name%");    
        }
    }

    public function scopeCode($query, $code){

        if (trim($code) != "")
        {
            return $query->where("id_donor","LIKE","%$code%");    
        }
    }
}