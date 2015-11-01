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
    /**
     * Desplegar proveedores
     *
     * @return Response
     */
    

    public function index(Request $request)
    {   
        $producto = Producto::all();
        if($request->get('type') == "nombre")
        {
        if($request->get('active') == 0)
            {
                $producto = Producto::name($request->get('name'))->orderBy('id','DESC')->paginate(10);
            }
        if($request->get('active') == 1)
            {
                $producto = Producto::name($request->get('name'))->active($request->get('active'))->orderBy('id','DESC')->paginate(10);    
            }
        else if($request->get('active') == 2)
            {
                $producto = Producto::all();
            }
        }
        if($request->get('type') == "codigo")
        {
        if($request->get('active') == 0)
            {
                $producto = Producto::code($request->get('name'))->active($request->get('active'))->orderBy('id','DESC')->paginate(10);    
            }
        if($request->get('active') == 1)
            {
                $producto = Producto::code($request->get('name'))->active($request->get('active'))->orderBy('id','DESC')->paginate(10);    
            }
        else if($request->get('active') == 2)
            {
                $producto = Producto::all();
            }
        }

        
        
        
        return View('productos.index',compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productos.create');
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
        
		$producto=Producto::create($request->all());
		//concatena la P al codigo
		$codigo =$producto->id+1000;
		$codigo = "P-".$codigo;
		$producto->codigo=$codigo;
		$producto->save();
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

