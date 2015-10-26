<?php

namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\InventarioRepo;
use Resources;
use RED\Despensa\Inventario;
use RED\Despensa\Producto;


class InventarioController extends Controller
{
	
protected $inventariorepo;
public function __construct(InventarioRepo $inventariorepo){
	
	
	$this->inventariorepo=$inventariorepo;
}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
	   
	 // $inventario=$this-inventariorepo->findall();
	  $inventario = Producto::all();
	  return View('inventario.verinventario',compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
	   
	     return view('inventario.create');
		
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
	  

    return redirect('/inventario')->with('message','store');
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
	   
	      $inventario = Inventario::find($id);
        return view('inventario.edit', ['inventario'=>$inventario]);
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
	     $inventario = Inventario::find($id);
	
        $inventario->fill($request->all());
        $inventario->save();

    return redirect('/inventario')->with('message','edit');
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
