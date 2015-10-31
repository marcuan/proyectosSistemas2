<?php

namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;
use RED;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\ClienteRepo;
use RED\Despensa\Ventum;
use RED\Restaurante\Cliente;

class VentasController extends Controller
{
    //   
    
    public function index (Request $request)
    {
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
 
    
    public function create ()
    {
        $clientes = RED\Restaurante\Cliente::All()->lists('id','nit');
        return view ('Despensa.venta.create', compact('clientes'));
    }
    
    public function store (Request $request)
    {
        RED\Despensa\Ventum::create($request->all('nit','id'));
        return redirect ('/venta')->with('message','store');
    }
    
    public function show($id)
    {
        //
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
