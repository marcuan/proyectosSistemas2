<?php 
namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;

use RED\Despensa\Proveedore;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use Resources;
use Illuminate\Support\Facades\Session;
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
    

    public function index(Request $request)
    {
       // $proveedor = Proveedore::all();
        //return View('proveedores.index',compact('proveedor'));

         $proveedor = Proveedore::orderBy('nombre', 'ASC')->paginate(10);
        return View('proveedores.index',compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
        Proveedore::create($request->all());
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
        $provider = Proveedore::find($id);
        return view('proveedores.edit', ['proveedores'=>$provider]);
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
            $provider = Proveedore::find($id);
            $provider->fill($request->all());
            $provider->save();

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
	public function getIndex($id)
		{
			$result = \DB::table('proveedores')
				->select('proveedores.nombre')
				->where('id','=',$id)
				->get();
				
			return  $result;
		}
}

