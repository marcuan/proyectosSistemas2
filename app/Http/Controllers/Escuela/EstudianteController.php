<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Estudiante;
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
        return view('Escuela.estudiante.index',compact('student'));
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
        Estudiante::create([
            'nombre_estudiante' => $request['nombre_estudiante'],
            'apellido_estudiante' => $request['apellido_estudiante'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'direccion' => $request['direccion'],
            'correo' => $request['correo'],
            'genero_id' => $request['genero'],
        ]);

    return redirect('/estudiantes')->with('message','store');
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
