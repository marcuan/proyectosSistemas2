<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horarios extends Model
{
    use SoftDeletes;

    protected $table = 'Horario';
    protected $fillable = [
    	'dia',
    	'hora_inicio',
    	'hora_fin',
    	'salon',
    	'curso_id'];

    protected $dates = ['deleted_at'];
    
    public function curso()
    {
        return $this->belongsTo('RED\Escuela\Curso');
    }

}