<?php

namespace RED\Ong;

use Illuminate\Database\Eloquent\Model;
use Illiminate\Database\Eloquent\SoftDeleters;

class Activity extends Model
{
	use SoftDeletes;

	protected $table = 'Activity';

	protected $filltable = [
		'id_Activity',
		'name_activity',
		'description',
		'place',
		'date_start',
		'date_end',
		'capacity',
		'address'
	];

	protected $dates = ['deleted_at'];

	

}