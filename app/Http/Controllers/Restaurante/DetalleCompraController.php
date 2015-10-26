<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Restaurante\DetalleCompra;
use RED\Restaurante\Compra;
use RED\Restaurante\MateriaPrima;
use Resources;


class DetalleCompraController extends Controller
{
	
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $DetalleCompra = DetalleCompra::all();
        return View('detallecompra.index',compact('DetalleCompra'));
    }

/**
     * Desplegar platillos por temporada
     *
     * @return Response
     */
    
    public function mostrardetallecompra($id)
    {
        $compra = Compra::find($id);
        return View('compra.detallecompra',compact('compra'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {	
        $compra = Compra::all()->last()->id;
        $opcionmateria = MateriaPrima::all()->lists('nombre','id');

        return view("detallecompra.create", compact('compra','opcionmateria'));  
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
        $opcionmateria = MateriaPrima::all()->lists('nombre','id');
      
	   //Aqui se actualiza la compra
	    $idcompra=$request['compras_id'];
	    $costo=$request['costo'];//Obtenemos el costo unitario 
	    $cantidad=$request['cantidad'];
	     $descuento=$request['descuento'];
  	    $subtotal=$cantidad*$costo;
	    DetalleCompra::create($request->all());
	   
	   $compra = Compra::find($idcompra);//Buscamos la compra
	
		
		$compra->subTotal=$compra->subTotal+$subtotal; //Actualizamos el subtotal
		
		$compra->total=$compra->subTotal-$descuento; //Descuento
		
	   $compra->save();//actualizar
	   $compra=$idcompra;
	   return view('detallecompra.create',compact('compra','opcionmateria'))->with('message','store');;
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
         $DetalleCompra = DetalleCompra::find($id);
        return view('detallecompra.edit', ['detallecompra'=>$DetalleCompra]);
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
        $DetalleCompra = DetalleCompra::find($id);
        $DetalleCompra->fill($request->all());
        $DetalleCompra->save();
        return redirect('/detallecompra')->with('message','edit');
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
