<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Restaurante\Temporada;
use Resources;
use Redirect;
use Gate;


class TemporadaController extends Controller
{
	
    /**
     * Desplegar temporadas.
     *
     * @return Response
     */
    public function mostrar()
    {
        
        $temporada = temporada::name($request->get('name'))->orderBy('nombre', 'ASC')->paginate(10);
        return View('temporada.temporada',compact('temporada'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$temporada = Temporada::all();
  	//$temporada = temporada::All();
        $this->authorize('listar',new Temporada());

        $temporadas = temporada::orderBy('nombre', 'ASC')->paginate(10);
        return View('temporada.temporada',compact('temporadas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
	       $this->authorize('crear',new Temporada());
	      return view('Temporada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('crear',new Temporada());
	    Temporada::create([
            'nombre' => $request['nombre_temporada'], 
	    'fecha_inicio' => $request['fecha_inicio'],
	    'fecha_fin' => $request['fecha_fin'], 
		  ]);
		   return redirect('/temporada')->with('message','store');
     
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
        $this->authorize('editar',new Temporada());
        $temporada = temporada::find($id);
        return view('temporada.edit', ['temporada'=>$temporada]);
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
        $this->authorize('editar',new Temporada());
        $temporada = temporada::find($id);
        $temporada->fill($request->all());
        $temporada->save();
        return redirect('/temporada')->with('message','edit');
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
