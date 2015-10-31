<?php

namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Despensa\DetalleConsignacion;
use RED\Despensa\Consignacion;
use RED\Despensa\Producto;
use Resources;


class DetalleConsignacionController extends Controller
{
	
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $DetalleConsignacion = DetalleConsignacion::all();
        return View('detalleconsignacion.index',compact('DetalleConsignacion'));
		/*if($request->ajax()){
            $sections = $view->renderSections();
            return Response::json($sections['contentPanel']); 
        }else return $view;*/
    }

    /**
     * Desplegar detalles de la compra
     *
     * @return Response
     */
    
    public function mostrardetalleconsignacion($id)
    {
        $detalle = Consignacion::find($id);
        return view('detalleconsignacion.detalleconsignacion',compact('detalle'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {	
        $consignacion = Consignacion::all()->last()->id;
        $opcionproducto = Producto::all()->lists('nombreProducto','id');

        return view("detalleconsignacion.create", compact('consignacion','opcionproducto'));  
        //return view("detallecompra.create", compact('compra','opcionmateria'));  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $opcionproducto = Producto::all()->lists('nombreProducto','id');
      	$producto = Producto::find($request->input('producto_id'));
	   
	    $idconsignacion=$request['consignacion_id'];
		$costo=$request['costo'];//Obtenemos el costo unitario 
	    $cantidad=$request['cantidad'];
	    DetalleConsignacion::create($request->all());
		$producto->existencia = $producto->existencia + $cantidad;
// pruebas debug and die		dd($producto->save());
		$producto->save();
	   $consignacion = Consignacion::find($idconsignacion);//Buscamos la compra
		
//	   $consignacion->save();//actualizar
	   $consignacion=$idconsignacion;
	   return view('detalleconsignacion.create',compact('consignacion','opcionproducto'))->with('message','store');;
      //  return redirect('/detallecompra')->with('message','store');
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
         $DetalleConsignacion = DetalleConsignacion::find($id);
        return view('detalleconsignacion.edit', ['detalleconsignacion'=>$DetalleConsignacion]);
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
        $DetalleConsignacion = DetalleConsignacion::find($id);
        $DetalleConsignacion->fill($request->all());
        $DetalleConsignacion->save();
        return redirect('/detalleconsignacion')->with('message','edit');
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
