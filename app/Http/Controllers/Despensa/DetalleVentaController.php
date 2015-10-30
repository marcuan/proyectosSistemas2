<?php

namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;
use RED;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\ClienteRepo;
use RED\Despensa\Ventum;
use RED\Restaurante\Cliente;

class DetalleVentasController extends Controller
{
    //   
    
    public function index ()
    {
        $venta = Ventum::All();
        return view ('Despensa.venta.index',compact('venta'));
    }
    
    
    public function buscarClientePorId ($idCliente)
    {
        $clienteComp = RED\Restaurante\Cliente::find(idCliente);
        return $clienteComp;
    }
    
    public function create (Request $request)
    {
        $clientes = RED\Restaurante\Cliente::name($request->get('name'))->orderBy('nombre', 'DESC')->paginate(7);
        return view ('Despensa.venta.create',compact('clientes'));
    }
    
    public function store (Request $request)
    {
        RED\Despensa\Ventum::create($request.All());
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
