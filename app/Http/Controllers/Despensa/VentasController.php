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
        return 'hola miriam te amo';
    }
    public function crear ()
    {
        $ventas = new RED\Despensa\Ventum;
        $ventas -> clientes_id = '';
        $ventas -> saved();
    }
    public function lista ()
    {
        $ventas = RED\Despensa\Ventum::all();
        return view('venta/create',compact('ventas')); 
    }
    public function editar ()
    {
        $ventas =  RED\Despensa\Ventum::find(1);
        $ventas -> clientes_id = '';
        $ventas -> saved();
    }
    public function borrar ()
    {
         $ventas =  RED\Despensa\Ventum::find(1);
        $ventas -> delete();
    }
}
