<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Escuela\Estudiante;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class AsignEstController extends Controller
{
	public function asignar($id) 
	{
		$course = Curso::All();
		$student = Estudiante::find($id);
		return view('Escuela.asignacionestudiante.index', compact(['course', 'student']));
	}
}