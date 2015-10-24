<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;
use RED\Restaurante\Cliente;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\Cliente;
//uso de facades
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$customer = Cliente::All();
        $customer = Cliente::name($request->get('name'))->orderBy('nombre', 'DESC')->paginate();
        return view ('cliente.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');
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
        Cliente::create([
            'nombre' => $request['nombre'],
            'nit' => $request['nit'],
            'telefono' => $request['telefono'],
            'dirección' => $request['dirección'],
            ]);

        return redirect('/clientes')->with('message','store');
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
        return view('cliente.edit');
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
        $cliente = Cliente::find($nit);

        $cliente->nombre = $request['nombre'];
        $cliente->nit = $request['nit'];
        $cliente->telefono = $request['telefono'];
        $cliente->dirección = $request['dirección'];

        $cliente->save();
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
        $cliente = Cliente::find($nit);
        $cliente = delete();
    }
}
