<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Escuela\Estudiante;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class AsignCursoController extends Controller
{
	public function asignarestudiantes($id) 
	{
		$curso = Curso::find($id);
		$students = Estudiante::all();
		return view('Escuela.asignacioncurso.index', compact(['curso', 'students']));
	}
}

