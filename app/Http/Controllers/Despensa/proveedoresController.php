<?php 
namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;

use RED\Despensa\Proveedore;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use Resources;

/**
* 
*/
class ProveedoresController extends Controller
{
	
    /**
     * Desplegar proveedores
     *
     * @return Response
     */
    
  


    /**
     * 
     *
     * @return Response
     */
    

    public function index()
    {
        $proveedor = Proveedore::all();
        return View('Despensa.proveedores.index',compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        Proveedore::create([
            'nombre' => $request['nombre_proveedor'],
            'telefono' => $request['tel_proveedor'],
            'direccion' => $request['dir_proveedor'],
            ]);
            return redirect('/proveedores')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

