<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Restaurante\Platillo;
use RED\Restaurante\Temporada;
use RED\Repositories\PlatillosRepo;
use Resources;


class PlatilloController extends Controller
{
    protected $platillorepo;
    public function __construct(PlatillosRepo $platillorepo){

        $this->platillorepo=$platillorepo;
    }
    

    /**
     * Desplegar platillos por temporada
     *
     * @return Response
     */
    
    public function mostrarplatillotemporada($id)
    {
        $temporada = Temporada::find($id);
        return View('platillo.platillotemporada',compact('temporada'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $platillo=$this->platillorepo->findall();
        return View('platillo.platillo',compact('platillo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //  
        return view('platillo.create');

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
        Platillo::create([
            'temporada_id'  =>  $request['temporada_id'],
            'nombre'        =>  $request['nombre'],
            'precio'        =>  $request['precio'],
            'descripcion'   =>  $request['descripcion'],
            ]);
        return redirect('/platillo')->with('message','store');
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
         $platillo = Platillo::find($id);
        return view('platillo.edit', ['platillo'=>$platillo]);
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
        $platillo = Platillo::find($id);
        $platillo->fill($request->all());
        $platillo->save();

        return redirect('/platillo')->with('message','edit');
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
