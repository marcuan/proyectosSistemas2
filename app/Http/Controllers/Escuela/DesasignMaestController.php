<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Escuela\Maestro;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class DesasignMaestController extends Controller
{
	public function desasignar($id, Request $request) 
	{
		$teacher = Maestro::find($id);
		$course = $teacher->cursos()->get();
		return view('Escuela.desasignacionmaestro.index', compact(['course', 'teacher']));
	}
}