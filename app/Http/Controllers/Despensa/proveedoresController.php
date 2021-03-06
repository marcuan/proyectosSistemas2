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
		$this->authorize('listar', new Proveedore());

		$proveedor = Proveedore::name($request->get('name'))->orderBy('nombre','ASC')->paginate(10);
		//$proveedor = Proveedore::orderBy('nombre', 'ASC')->paginate(10);
		return View('proveedores.index',compact('proveedor'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$this->authorize('crear', new Proveedore());
		
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
		$this->authorize('crear', new Proveedore());

		Proveedore::create([    
			'nombre' => $request['nombre'],
			'telefono' => $request['telefono'],
			'direccion' => $request['direccion'],
			]);

	 
			return redirect('/proveedores')->with('message','store');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->authorize('editar', new Proveedore());

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
		$this->authorize('editar', new Proveedore());

		$provider = Proveedore::find($id);
		$provider->fill($request->all());
		$provider->save();
	
		return redirect('/proveedores')->with('message','edit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->authorize('inhabilitar', new Proveedore());

		$proveedor = Proveedore::find($id);
		$proveedor->delete();  

		return redirect('/proveedores')->with('message','erase');
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

