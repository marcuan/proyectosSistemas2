<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

use RED\Restaurante\DetalleVenta;

use RED\Restaurante\Temporada;
use RED\Repositories\TemporadaRepo;

use RED\Repositories\PlatillosRepo;
use RED\Restaurante\Platillo;

use RED\Despensa\Ventum;
use Resources;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $DetalleVenta = DetalleVenta::all();
        return view('detalleventa.index', compact('DetalleVenta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        //'temporada_id',
        //'nombre',
        //'precio',
        //'descripcion'
        //$customer = Cliente::name($request->get('name'))->orderBy('nombre', 'DESC')->paginate(7);

        $opcionplatillo = Platillo::all();
        $precio = Platillo::all()->last()->precio; //captura solo un precio
        $idsales = Ventum::all()->last()->id;    //ultima venta realizada
        $platillosrest = Platillo::name($request->get('name'))->orderBy('nombre', 'DESC')->paginate(5);
        return view('detalleventa.create', compact('opcionplatillo', 'precio', 'idsales', 'platillosrest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $cantidad = $request['cantidad'];
        $total = $request['subprecio'];         //aqui capturo el precio del platillo
        $tiendaorestaurante = $request['tiendaorestaurante'];
        $idventa = $request['venta_id'];
        $idproducto = $request['producto_id'];
        $idplatillo = $request['platillo_id'];

        DetalleVenta::create($request->all());

        $searchdetalleventa = DetalleVenta::all()->last()->id;
        echo "$searchdetalleventa";

        $encontrartotal = DetalleVenta::where('id', '=', $searchdetalleventa)->get(array('total'));
        $valtotal = $request->input('total');   //valor 1 es el precio del platillo
        echo("$valtotal");
        $encontrarcantidad = DetalleVenta::where('id', '=', $searchdetalleventa)->get(array('cantidad'));
        $numcantidad = $request->input('cantidad');
        echo "$numcantidad";
        //var_dump("$valtotal");
        //$searchsaleorest = DetalleVenta::where('id', '=', $searchdetalleventa)->get(array('tiendaorestaurante'));
        //$numrestaurante = $request->input('tiendaorestaurante');
        //$searchidventa = DetalleVenta::where('id', '=', $searchdetalleventa)->get(array('venta_id'));
        //$numventa = $request->input('venta_id');
        //$searchidporducto = DetalleVenta::where('id', '=', $searchdetalleventa)->get(array('producto_id'));
        //$numproducto = $request->input('producto_id');


              
        $searchdetalleventa->total = $searchdetalleventa->$subtotal;  //ayuda con la depuración :P
        

        return redirect('/detalleventa')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $detalleventa = DetalleVenta::find($id);
        return view('detalleventa.edit', ['detalleventa'=>$DetalleVenta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
