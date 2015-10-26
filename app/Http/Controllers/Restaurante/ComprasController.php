<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Restaurante\Compra;
use RED\Restaurante\DetalleCompra;
use RED\Repositories\ProveedorRepo;
use RED\Despensa\Proveedore;
use Resources;

class ComprasController extends Controller
{
	protected $proveedorrepo;
    public $opcionproveedor;

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
        //Cargar nombre de proveedores
        $opcionproveedor = Proveedore::all()->lists('nombre', 'id');
        return view("compra.create", compact('opcionproveedor'));        
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
        //Redirigir la compra al detalle de compra
        return redirect('/detallecompra/create');
        //return view("detallecompra.create");   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return redirect('detallecompra/'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //$opcionproveedor = Proveedore::find($id)->lists('id');
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
        return redirect('/compra')->with('message','edit');
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
	    return View('compra.comprasaproveedor',compact('proveedore'));
	   //dd($proveedore);
    }
}
