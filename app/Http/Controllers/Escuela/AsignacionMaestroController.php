<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Http\Requests;
use RED\Escuela\Maestro;
use RED\Escuela\Curso;
use RED\Http\Controllers\Controller;

class AsignacionMaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $idmaestro = $request['idmaestro'];
        $maestro = Maestro::find($idmaestro);
        $idcurso = $request['curso'];
        if($request['check'] != null) {
            foreach ($request['check'] as $dato) {
                $maestro->cursos()->attach($idcurso[$dato]);
            }

            return redirect('/maestros/'.$idmaestro)->with('message','assign');
        } else {
            return redirect('/maestros/'.$idmaestro)->with('message','no-assign');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
