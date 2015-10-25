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
        % venta = venta::All();
        return;
        view ('Despensa.venta.index',compact('course'));
    }
    
    public function create ()
    {
        return view ('Despensa.venta.create');;
    }
    
    public function store (Request $request)
    {
        Venta::create ($request->all());
        return redirect ('/ventas'->with('message','store'));
    }
    
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $venta = Venta::find($id);
        return view('Despensa.venta.edit', ['venta'=>$venta]);
    }
    
    
   public function update(Request $request, $id)
    {
        $venta = Venta::find($id);
        $venta->fill($request->all());
        $venta->save();

        return redirect('/ventas')->with('message','edit');
    }
    
    public function destroy($id)
    {
        //
    }
    
    public function crear ()
    {
        $ventas = new App\Cliente;
        $ventas -> clientes_id = '1';
        $ventas -> save();
    }
    public function lista ()
    {
        $ventas =  RED\Despensa\Ventum::all();
        return $ventas;
    }
    public function editar ()
    {
        return 'hola miriam te extraño demasiado mucho';
    }
    public function borrar ()
    {
        return 'hola miriam te extraño demasiado tu cucu';
    }
}
