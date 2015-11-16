<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Escuela\Estudiante;
use RED\Escuela\Horarios;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class CursoEstudiantesController extends Controller
{
	public function verestudiantes($id) 
	{
        $this->authorize('estudiantes_ver', new Curso());
	
		$curso = Curso::find($id);
		$estudiantes = $curso->estudiantes()->get();
		return view('Escuela.curso.estudiantes', compact(['curso', 'estudiantes']));
	}

	public function crearhorario($id) 
	{
        $this->authorize('horario_agregar', new Curso());
		
		$curso = Curso::find($id);
		$horarios = $curso->horarios()->get();
		return view('Escuela.horario.create', compact(['curso', 'horarios']));
	}
}
