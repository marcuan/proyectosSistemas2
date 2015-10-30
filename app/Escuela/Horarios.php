<?php

namespace RED\Escuela;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table = 'Horario';
    protected $fillable = [
    	'dia',
    	'hora_inicio',
    	'hora_fin',
    	'salon',
    	'curso_id'];

    public function curso()
    {
        return $this->belongsTo('RED\Escuela\Curso');
    }

}
