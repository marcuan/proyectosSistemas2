<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Restaurante\Compra;
use RED\Repositories\ProveedorRepo;
use Resources;

class ComprasController extends Controller
{
	protected $proveedorrepo;
public function __construct(ProveedorRepo $proveedorrepo){
	
	
	$this->proveedorrepo=$proveedorrepo;
}
	
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $compra = Compra::all();
        return view('compra.index', compact('compra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('compra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Compra::create($request->all());
        return redirect('/compra')->with('message','store');
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
        $compra = Compra::find($id);
        return view('compra.edit', ['compra'=>$compra]);
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
        $compra = Compra::find($id);
        $compra->fill($request->all());
        $compra->save();
        return redirect('/compras')->with('message','edit');
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
    
    public function proveedor($id)
    {
        //Buscamo al proveedor con ese id
	   $proveedore=$this->proveedorrepo->find($id);
	    return View('compras.comprasaproveedor',compact('proveedore'));
	   //dd($proveedore);
    }
}
