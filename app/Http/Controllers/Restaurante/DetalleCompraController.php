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
        $DetalleCompra = DetalleCompra::orderBy('id','DESC')->paginate(10);
        return View('detallecompra.index',compact('DetalleCompra'));
    }

    /**
     * Desplegar detalles de la compra
     *
     * @return Response
     */
    
    public function mostrardetallecompra($id)
    {
        $detalle = Compra::find($id);
        return view('detallecompra.detallecompra',compact('detalle'));
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $compra = Compra::all()->last();
        DetalleCompra::create([
            'materia_prima_id'=>$request['valor1'],
            'compras_id'=>$compra->id,
            'cantidad'=>$request['cantidad'],
            'costo'=>$request['costo'],
            'fecha_inicio' => $request['fecha_inicio'],
            'fecha_fin' => $request['fecha_fin'],
        ]);
        $subtotaldetalle= $request['cantidad']*$request['costo'];
        $subtotal=$compra->subtotal;
        $compra->subtotal=$subtotal+$subtotaldetalle;
        $total=$compra->total;
        $compra->total=$total+$subtotaldetalle;
        $compra->save();
        return redirect('/compra/'.$compra->id);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //asignar # a la casilla compra
        $compra = $id;
        return redirect('/search/');
/*        $opcionmateria = MateriaPrima::all()->lists('nombre','id');
        return view("detallecompra.create", compact('compra','opcionmateria'));  
*/        
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
