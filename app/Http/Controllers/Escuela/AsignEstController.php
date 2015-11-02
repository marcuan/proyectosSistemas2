<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Escuela\Estudiante;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use Carbon\Carbon;

class AsignEstController extends Controller
{
	public function asignar($id, Request $request) 
	{
		$carbon = new Carbon();
        $date = $carbon->now();
		if($request->get('name') != "")
		{
			$course = Curso::name($request->get('name'))->where('fecha_fin','>',$date)->where('num_estudiantes','<=','max_estudiantes')->orderBy('id','DESC')->paginate(10);   
		}
		else
		{
			$course = Curso::where('fecha_fin','>',$date)->where('num_estudiantes','<=','max_estudiantes')->orderBy('id','DESC')->paginate(10);

		}
		$student = Estudiante::find($id);
		return view('Escuela.asignacionestudiante.index', compact(['course', 'student']));
	}
}
