<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Restaurante\Compra;
use RED\Restaurante\DetalleCompra;
use RED\Repositories\ProveedorRepo;
use RED\Despensa\Proveedore;
use RED\Restaurante\MateriaPrima;
use Resources;
use Redirect;
use Gate;

class ComprasController extends Controller
{
	protected $proveedorrepo;
    public $opcionproveedor;

    public function __construct(ProveedorRepo $proveedorrepo)
    {
    	$this->proveedorrepo=$proveedorrepo;
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('listar',new Compra());

        if ($request->get('type')=='' && $request->get('fecha')=='')
        {           
            //$compras = Compra::All();
            $compras = Compra::orderBy('fecha','DESC')->paginate(10);
             return view ('compra.index',compact('compras'));
        }

        if ($request->get('type')!='' && $request->get('fecha')=='')
        {   
            $compras = Compra::code($request->get('type'))->orderBy('id')->paginate(10);
           return view ('compra.index',compact('compras'));
        }

        if ($request->get('fecha')!='' && $request->get('type')=='')
        {   
            $compras = Compra::fecha($request->get('fecha'))->orderBy('id')->paginate(10);
           return view ('compra.index',compact('compras'));
        }



        //
        //return view('compra.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //mostrar fecha actual
        $this->authorize('crear',new Compra());

        $fecha = date('Y-m-d');
        //Cargar nombre de proveedores
        $opcionproveedor = Proveedore::all();
        //$opcionproveedor = Proveedore::all()->lists('nombre', 'id');
	    $materiaprima=Materiaprima::all();
        return view("compra.create", compact('opcionproveedor','materiaprima','fecha'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
	 
        //Compra::create($request->all());
        
        
        Compra::create([
            'fecha' => $request['fecha'],
            'subtotal'=>'0',
            'descuento'=>'0',
            //'subtotal' => $request['subTotal'],
            //'descuento' => $request['descuento'],
            'proveedores_id' => $request['proveedores_id'],
            'total'=>'0',
            //'total' => $request['total'],
        ]);
	     
         $opcionmateria = MateriaPrima::all();
        return view("detallecompra.create", compact('opcionmateria'));     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('detalle',new Compra());
        $detalle = Compra::find($id);
        return view('detallecompra.detallecompra',compact('detalle'));
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
        $this->authorize('editar',new Compra());
        $opcionproveedor = Proveedore::all();
        $compra = Compra::find($id);
        return view('compra.edit', ['compra'=>$compra],['opcionproveedor'=>$opcionproveedor]);
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
        $this->authorize('editar',new Compra());
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

    public function verdetallecompra($id){

        $detalle = Compra::find($id);
        return view('detallecompra.verdetalle',compact('detalle'));
    }
    
    public function proveedor($id)
    {
        //Buscamo al proveedor con ese id
	   $proveedore=$this->proveedorrepo->find($id);
	    return View('compra.comprasaproveedor',compact('proveedore'));
	   //dd($proveedore);
    }
}
