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
use RED\Restaurante\Cliente;
use Resources;

use Carbon\Carbon;
use RED;
use RED\Repositories\ClienteRepo;

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

        $opcionplatillo = Platillo::all();
        $idsales = Ventum::all()->last()->id;    //ultima venta realizada
        return view('detalleventa.create', compact('opcionplatillo', 'idsales'));
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
        $total = $request['valor'];
        $tiendaorestaurante = $request['tiendaorestaurante'];
        $idventa = $request['venta_id'];
        $idproducto = $request['producto_id'];
        $idplatillo = $request['platillo_id'];
        DetalleVenta::create($request->all());


        $buscardetalleventa = DetalleVenta::all()->last()->id;  

        $val1 = $request['valor'];        //echo "$val1";        

        $encontrarcantidad = DetalleVenta::where('id', '=', $buscardetalleventa)->get(array('cantidad'));
        $numcantidad = $request->input('cantidad');

        $encontrarplatillo = DetalleVenta::where('id', '=', $buscardetalleventa)->get(array('platillo_id'));
        $idplat = $request->input('platillo_id');        

        $totalreal = $val1 * $numcantidad;
        $totalacumulado = 0;
        echo "$totalreal";
       
        $detalleventa = DetalleVenta::find($buscardetalleventa);
        $detalleventa->total = "$totalreal";
        echo "$detalleventa";
        $detalleventa->save();
              
        //$searchdetalleventa->total1 = $buscardetalleventa->$subtotal;  //ayuda con la depuración :P
        

        return redirect()->back();
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
            $date = Carbon::now();
            $date = $date->format('Y-m-d');
            $venta = new  RED\Despensa\Ventum;
            $venta -> fechaVenta = $date;
            $venta -> descuento = '0.00';
            $venta -> subtotal = '0.00';
            $venta -> total = '0.00';
            $venta -> anulado = '0';
            $venta -> clientes_id = $id;  
            $venta -> save();
            
            $ultimaventa = Ventum::all()->last()->id;
            $DetalleVenta = DetalleVenta::where('venta_id', '=', $ultimaventa);
            //$idsales = Ventum::all()->last()->id;
            return view('detalleventa.index',compact('venta', 'DetalleVenta', 'opcionplatillo', 'idsales'));
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
