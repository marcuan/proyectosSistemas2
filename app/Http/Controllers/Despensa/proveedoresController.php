<?php 
namespace RED\Http\Controllers;

use Illuminate\Http\Request;

use RED\Http\Requests;
use App\Http\Controllers\Controller;

/**
* 
*/
class proveedoresController extends Controller
{
	
    /**
     * Desplegar proveedores
     *
     * @return Response
     */
    
    public function mostrar()
    {
        $proveedor = Proveedore::all();
        return View('proveedores.proveedor',compact('proveedor'));
    }


    /**
     * Desplegar platillos por temporada
     *
     * @return Response
     */
    

    public function index()
    {
        return view('proveedores/proveedor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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

