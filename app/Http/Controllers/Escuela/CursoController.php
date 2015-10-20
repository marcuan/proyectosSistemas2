<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $course = \RED\Escuela\Curso::All();
        return view('Escuela.curso.index',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Escuela.curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Curso::create([
            'codigo' => $request['codigo'],
            'nombre_curso' => $request['nombre_curso'],
            'descripcion' => $request['descripcion'],
            'fecha_inicio' => $request['fecha_inicio'],
            'fecha_fin' => $request['fecha_fin'],
            'max_estudiantes' => $request['max_estudiantes'],
        ]);

    return redirect('/cursos')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('Escueala.curso.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);

        $curso->codigo = $request['codigo'];
        $curso->nombre_curso = $request['nombre_curso'];
        $curso->descripcion = $request['descripcion'];
        $curso->fecha_inicio = $request['fecha_inicio'];
        $curso->fecha_fin = $request['fecha_fin'];
        $curso->max_estudiantes = $request['max_estudiantes'];
        $curso->num_estudiantes = $request['num_estudiantes'];

        $curso->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
    }
}
