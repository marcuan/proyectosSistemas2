<?php

namespace RED\Ong;

use Illuminate\Database\Eloquent\Model;
use Illiminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{

	protected $table = 'Activity';

	protected $fillable = [
		'id',
		'name',
		'description',
		'date_start',
		'date_end',
		'capacity',
		'address'
	];

	protected $dates = ['deleted_at'];

	

}