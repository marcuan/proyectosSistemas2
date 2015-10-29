<?php 
namespace RED\Http\Controllers\Despensa;

use Illuminate\Http\Request;

use RED\Despensa\Consignacion;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\ProveedorRepo;
use RED\Despensa\Proveedore;
use Resources;

/**
* 
*/
class ConsignacionController extends Controller
{


    protected $proveedorrepo;
    public $opcionproveedor;

    public function __construct(ProveedorRepo $proveedorrepo)
    {
        $this->proveedorrepo=$proveedorrepo;
    }
	
    /**
     *
     *
     * @return Response
     */

    public function index()
    {
        $consignacion = Consignacion::all();
        return View('consignaciones.index',compact('consignacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $opcionproveedor = Proveedore::all()->lists('nombre','id');
        return view('consignaciones.create', compact('opcionproveedor'));
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
        Consignacion::create($request->all());
            return redirect('/consignaciones')->with('message','store');
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
        $consignacion = Consignacion::find($id);
        return view('consignaciones.edit', ['consignaciones'=>$consignacion]);
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
            $consignacion = Consignacion::find($id);
            $consignacion->fill($request->all());
            $consignacion->save();
            return redirect('/consignaciones')->with('message','edit');

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

    public function proveedor($id)
    {
        $proveedore=$this->proveedorrepo->find($id);
        
    }
}

