<?php 
namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;

use RED\Despensa\Producto;
use RED\Despensa\Consignacion;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use Resources;

/**
* 
*/
class ProductosController extends Controller
{

	public $opcionConsignacion=1;
    /**
     * Desplegar proveedores
     *
     * @return Response
     */
    

    public function index()
    {
        $producto = Producto::all();
        return View('productos.index',compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $opcionConsignacion = Consignacion::all()->lists('id');
        return view('productos.create',compact('opcionConsignacion'));
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
        Producto::create($request->all());
            return redirect('/producto')->with('message','store');
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
    public function edit($idProducto)
    {
        //
        $provider = Producto::find($idProducto);
        return view('productos.edit', ['productos'=>$provider]);
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
            $provider = Producto::find($id);
            $provider->fill($request->all());
            $provider->save();
            return redirect('/producto')->with('message','edit');

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

