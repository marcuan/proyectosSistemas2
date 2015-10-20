<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Restaurante\Temporada;
use Resources;


class TemporadaController extends Controller
{
	
    /**
     * Desplegar temporadas.
     *
     * @return Response
     */
    public function mostrar()
    {
        $temporada = Temporada::all();
        return View('temporada.temporada',compact('temporada'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
	   
	    $temporada = Temporada::all();
        return View('temporada.temporada',compact('temporada'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
	   
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
	    Temporada::create([
            'nombre' => $request['nombre_temporada'],  
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
        //
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
        //
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
