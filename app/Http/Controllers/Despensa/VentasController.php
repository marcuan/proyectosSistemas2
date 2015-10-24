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
        return 'hola miriam te extraño demasiado';
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
