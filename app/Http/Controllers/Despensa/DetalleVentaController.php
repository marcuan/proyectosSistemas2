<?php

namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;
use RED;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\ClienteRepo;
use RED\Despensa\Ventum;
use RED\Restaurante\Cliente;

class DetalleVentaController extends Controller
{
    
    public function index ()
    {
        return view ('Despensa.detalleVenta.create',compact('detalleVenta'));
    }
    
    public function create (Request $request)
    {
       return view ('Despensa.detalleVenta.create');
    }
    
    public function store (Request $request)
    {
        RED\Despensa\DetalleVentum::create($request.All()); 
        return redirect ('/venta')->with('message','store');
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $detalleVenta = RED\Despensa\DetalleVentum::find($id);
        return view('Despensa.detalleVenta.edit', ['detalleVenta'=>$detalleVenta]);
    }
        
   public function update(Request $request, $id)
    {
        $venta = RED\Despensa\DetalleVentum::find($id);
        $venta->fill($request->all());
        $venta->save();
        return redirect('/venta')->with('message','edit');
    }
    
    public function destroy($id)
    {
        //
    }
    
}
