<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Estudiante;
use RED\Escuela\Curso;
use RED\Escuela\Telefono;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $student = Estudiante::All();
        return view('Escuela.estudiante.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Escuela.estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $estudiante = Estudiante::create($request->all());

        $telefono = new Telefono;
        $telefono->numero_telefono = $request['numero_telefono'];
        $telefono->estudiante_id = $estudiante->id;
        $telefono->save();
        
    return redirect('/estudiantes')->with('message', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $course = Curso::All();
        $student = Estudiante::find($id);
        return view('Escuela.estudiante.assign', compact('course', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        return view('Escuela.estudiante.edit', ['estudiante'=>$estudiante]);
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
        $estudiante = Estudiante::find($id);
        $estudiante->fill($request->all());
        $estudiante->save();

    return redirect('/estudiantes')->with('message','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
