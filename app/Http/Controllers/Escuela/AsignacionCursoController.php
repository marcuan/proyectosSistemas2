<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class AsignacionCursoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idcurso = $request['idcurso'];
        $curso = Curso::find($idcurso);
        $idestudiante = $request['estudiante'];
        if($request['check'] != null) {
            foreach ($request['check'] as $dato) {
                $curso->estudiantes()->attach($idestudiante[$dato]);
                $curso->num_estudiantes = $curso->num_estudiantes - 1;
                $curso->save();
            }

            return redirect('/cursos/'.$idcurso)->with('message','assign');
        } else {
            return redirect('/cursos/'.$idcurso)->with('message','no-assign');
        }
    }
}
