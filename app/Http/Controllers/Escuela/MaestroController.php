<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Maestro;
use RED\Escuela\Curso;
use RED\Escuela\Telefono;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        if($request->get('type') == "nombre")
        {
            $teacher = Maestro::name($request->get('name'))->orderBy('id','DESC');
        }
        else if($request->get('type') == "codigo")
        {
            $teacher = Maestro::code($request->get('name'))->orderBy('id','DESC');
        }
        else 
        {
            $teacher = Maestro::orderBy('id','DESC')->paginate(2);
        }

        return view('Escuela.maestro.index',compact('teacher'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Escuela.maestro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $maestro = Maestro::create($request->all());

        $telefono = new Telefono;
        $telefono->numero_telefono = $request['numero_telefono'];
        $telefono->maestro_id = $maestro->id;
        $telefono->save();

    return redirect('/maestros')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $teacher = Maestro::find($id);
        $courses = $teacher->cursos()->get();
        $telefono = $teacher->telefonos()->get()->first();
        return view('Escuela.maestro.assign', compact(['courses', 'teacher', 'telefono']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $maestro = Maestro::find($id);
        $telefono = $maestro->telefonos()->get()->first();
        return view('Escuela.maestro.edit', compact(['maestro','telefono']));
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
        $maestro = Maestro::find($id);
        $maestro->fill($request->all());
        $maestro->save();

        $telefono = $maestro->telefonos()->get()->first();
        $telefono->numero_telefono = $request['numero_telefono'];
        $telefono->save();        

    return redirect('/maestros')->with('message','edit');
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
