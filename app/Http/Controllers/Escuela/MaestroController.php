<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Maestro;
use RED\Escuela\Curso;
use RED\Escuela\Telefono;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use Carbon\Carbon;

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
            if($request->get('active') == "activos")
            {
                $teacher = Maestro::name($request->get('name'))->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "inhabilitados")
            {
                $teacher = Maestro::name($request->get('name'))->onlyTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "todos")
            {
                $teacher = Maestro::name($request->get('name'))->withTrashed()->orderBy('id','DESC')->paginate(10);    
            }
        }
        else if($request->get('type') == "codigo")
        {
            if($request->get('active') == "activos")
            {
                $teacher = Maestro::code($request->get('name'))->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "inhabilitados")
            {
                $teacher = Maestro::code($request->get('name'))->onlyTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "todos")
            {
                $teacher = Maestro::code($request->get('name'))->withTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            
        }
        else 
        {
            $teacher = Maestro::orderBy('id','DESC')->paginate(10);
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
        $carbon = new Carbon();
        $date = $carbon->now()->year-2000;
        $codigo = $maestro->id + 100;
        $maestro->codigo = "cat-".$codigo ."". $date;
        $maestro->save();        

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
        $maestro = Maestro::find($id);
        $maestro->delete();  

    return redirect('/maestros')->with('message','erase');
    }
}
