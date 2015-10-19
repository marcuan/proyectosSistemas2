<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\MateriaPrimaRepo;
use Resources;


class MateriaPrimaController extends Controller
{
	
protected $materiaprimarepo;
public function __construct(MateriaPrimaRepo $materiaprimarepo){
	
	
	$this->materiaprimarepo=$materiaprimarepo;
}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
    
    public function prueba()
    {
        //
	  // dd('exito');
	   $materiaprima=$this->materiaprimarepo->findall();
	 //  dd($materiaprima);
	  return View('materiaprima.todamateriaprima',compact('materiaprima'));
	   //dd($materiaprima->nombre);
    }

    //realizando pruebas
    //public function Pruebavista(){          //Pruebavista funcion que contiene la vista

      //  return View('pruebasvistas/test');
    //}
}
