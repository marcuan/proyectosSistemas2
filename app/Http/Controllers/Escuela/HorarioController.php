<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Http\Requests;
use RED\Escuela\Curso;
use RED\Escuela\Horarios;
use RED\Http\Controllers\Controller;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horarios::orderBy('hora_inicio')->get();
        return view('Escuela.horario.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idcurso = $request['curso'];
        $horario = new Horarios;
        $horario->dia = $request['dia'];
        $horario->hora_inicio = $request['hora_inicio'];
        $horario->hora_fin = $request['hora_fin'];
        $horario->salon = $request['salon'];
        $horario->curso_id = $idcurso;
        $horario->save();

    return redirect('/cursos/'.$idcurso)->with('message','assign');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario = Horarios::find($id);
        return view('Escuela.horario.edit', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $horario = Horarios::find($id);
        $idcurso = $horario->curso_id;
        $horario->dia = $request['dia'];
        $horario->hora_inicio = $request['hora_inicio'];
        $horario->hora_fin = $request['hora_fin'];
        $horario->salon = $request['salon'];
        $horario->save();

     return redirect('/cursos/'.$idcurso)->with('message','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horarios::find($id);
        $idcurso = $horario->curso_id;
        $horario->delete();  

    return redirect('/cursos/'.$idcurso)->with('message','erase');
    }
}
