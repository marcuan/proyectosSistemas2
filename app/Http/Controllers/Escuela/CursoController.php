<?php

namespace RED\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use RED\Escuela\Curso;
use RED\Escuela\Horarios;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class CursoController extends Controller
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
                $course = Curso::name($request->get('name'))->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "inhabilitados")
            {
                $course = Curso::name($request->get('name'))->onlyTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "todos")
            {
                $course = Curso::name($request->get('name'))->withTrashed()->orderBy('id','DESC')->paginate(10);    
            }   
            
        }
        else if($request->get('type') == "codigo")
        {
            if($request->get('active') == "activos")
            {
                $course = Curso::code($request->get('name'))->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "inhabilitados")
            {
                $course = Curso::code($request->get('name'))->onlyTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "todos")
            {
                $course = Curso::code($request->get('name'))->withTrashed()->orderBy('id','DESC')->paginate(10);    
            }
        }
        else
        {
            $course = Curso::orderBy('id','DESC')->paginate(10);
        }
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
        Curso::create($request->all());

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
        $curso = Curso::find($id);
        $horario = $curso->horarios()->get();
        return view('Escuela.curso.info', compact(['curso', 'horario']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        return view('Escuela.curso.edit', ['curso'=>$curso]);
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
        $curso->fill($request->all());
        $curso->save();

     return redirect('/cursos')->with('message','edit');
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

    return redirect('/cursos')->with('message','erase');
    }
}
