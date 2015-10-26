<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Escuela\Maestro;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class AsignMaestController extends Controller
{
	public function asignar($id, Request $request) 
	{
		if($request->get('name') != "")
		{
			$course = Curso::name($request->get('name'))->orderBy('id','DESC')->paginate(10);   
		}
		else
		{
			$course = Curso::orderBy('id','DESC')->paginate(10);	
		}
		$teacher = Maestro::find($id);
		return view('Escuela.asignacionmaestro.index', compact(['course', 'teacher']));
	}
}