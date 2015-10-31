<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Estudiante;
use RED\Escuela\Curso;
use RED\Escuela\Telefono;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use Carbon\Carbon;

class EstudianteController extends Controller
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
            if($request->get('active') == "activos")
            {
                $student = Estudiante::name($request->get('name'))->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "inhabilitados")
            {
                $student = Estudiante::name($request->get('name'))->onlyTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "todos")
            {
                $student = Estudiante::name($request->get('name'))->withTrashed()->orderBy('id','DESC')->paginate(10);    
            }
        }
        else if($request->get('type') == "codigo")
        {
            if($request->get('active') == "activos")
            {
                $student = Estudiante::code($request->get('name'))->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "inhabilitados")
            {
                $student = Estudiante::code($request->get('name'))->onlyTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "todos")
            {
                $student = Estudiante::code($request->get('name'))->withTrashed()->orderBy('id','DESC')->paginate(10);    
            }
        }
        else
        {
            $student = Estudiante::orderBy('id','DESC')->paginate(10);
        }
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
        $carbon = new Carbon();
        $date = $carbon->now()->year-2000;
        $codigo = $estudiante->id + 100;
        $estudiante->codigo = "est-".$codigo ."". $date;
        $estudiante->save();        

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
        $student = Estudiante::find($id);
        $courses = $student->cursos()->get();
        $telefono = $student->telefonos()->get()->first();
        return view('Escuela.estudiante.assign', compact(['courses', 'student', 'telefono']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        $telefono = $estudiante->telefonos()->get()->first();
        return view('Escuela.estudiante.edit', compact(['estudiante','telefono']));
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
        
        $telefono = $estudiante->telefonos()->get()->first();
        $telefono->numero_telefono = $request['numero_telefono'];
        $telefono->save();        

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
        $estudiante = Estudiante::find($id);
        $estudiante->delete();  

    return redirect('/estudiantes')->with('message','erase');
    }
}
