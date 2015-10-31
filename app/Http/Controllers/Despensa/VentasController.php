<?php

namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;
use RED;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\ClienteRepo;
use RED\Despensa\Ventum;
use RED\Restaurante\Cliente;
use Carbon\Carbon;

class VentasController extends Controller
{
    //   
    
    public function index (Request $request)

        if ($request->get('type')=='' && $request->get('fecha')=='')
        {       
            
        $venta = Ventum::All();
             return view ('Despensa.venta.index',compact('venta'));
        }
        if ($request->get('type')!='' && $request->get('fecha')=='')
        {   
            $venta = Ventum::code($request->get('type'))->orderBy('id')->paginate(10);
           return view ('Despensa.venta.index',compact('venta'));
        }
        if ($request->get('fecha')!='' && $request->get('type')=='')
        {   
            $venta = Ventum::fecha($request->get('fecha'))->orderBy('fechaVenta')->paginate(10);
           return view ('Despensa.venta.index',compact('venta'));
        }
        
    }
 
    

    
    public function create (Request $request)
    {
         $clientes = RED\Restaurante\Cliente::name($request->get('name'))->orderBy('nombre', 'DESC')->paginate(7);
        return view ('Despensa.venta.create',compact('clientes'));
    }
    
    public function store (Request $request)
    {
        RED\Despensa\Ventum::create($request.All());
        return view ('Despensa.venta.create',compact('clientes'));
    }
    
    public function show($id)
    {
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
        return view ('Despensa.detalleVenta.create',compact('venta'));
    }
    
    public function edit($id)
    {
        $venta = RED\Despensa\Ventum::find($id);
        return view('Despensa.venta.edit', ['venta'=>$venta]);
    }
    
    public function anular($id)
    {
        $venta = RED\Despensa\Ventum::find($id);
        return view('Despensa.venta.edit', ['venta'=>$venta]);
    }
    
    
   public function update(Request $request, $id)
    {
        $venta = RED\Despensa\Ventum::find($id);
        $venta->fill($request->all());
        $venta->save();
        return redirect('/venta')->with('message','edit');
    }
    
    public function destroy($id)
    {
        //
    }
    
}
