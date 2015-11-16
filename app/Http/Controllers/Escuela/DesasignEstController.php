<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Escuela\Estudiante;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class DesasignEstController extends Controller
{
	public function desasignar($id, Request $request) 
	{
		$this->authorize('cursos', new Estudiante());
		
		$student = Estudiante::find($id);
		$course = $student->cursos()->get();
		return view('Escuela.desasignacionestudiante.index', compact(['course', 'student']));
	}
}
