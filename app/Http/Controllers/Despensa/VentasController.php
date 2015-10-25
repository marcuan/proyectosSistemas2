<?php

namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;
use RED;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class VentasController extends Controller
{
    //
    public function index ()
    {
        $venta = RED\Despensa\Ventum::All();
        return view ('Despensa.venta.index',compact('venta'));
    }
    
    public function create ()
    {
        return view ('Despensa.venta.create');;
    }
    
    public function store (Request $request)
    {
        RED\Despensa\Ventum::create($request->all());
        return redirect ('/venta')->with('message','store');
    }
    
    public function show($idVenta)
    {
        //
    }
    
    public function edit($idVenta)
    {
        $venta = RED\Despensa\Ventum::find($idVenta);
        return view('Despensa.venta.edit', ['venta'=>$venta]);
    }
    
    
   public function update(Request $request, $idVenta)
    {
        $venta = RED\Despensa\Ventum::find($idVenta);
        $venta->fill($request->all());
        $venta->save();
        return redirect('/venta')->with('message','edit');
    }
    
    public function destroy($idVenta)
    {
        //
    }
    
}
