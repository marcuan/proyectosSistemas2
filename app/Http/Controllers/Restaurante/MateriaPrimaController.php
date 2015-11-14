<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Repositories\MateriaPrimaRepo;
use Resources;
use RED\Restaurante\MateriaPrima;
use Redirect;
use Gate;


class MateriaPrimaController extends Controller
{
	
protected $materiaprimarepo;
public function __construct(MateriaPrimaRepo $materiaprimarepo){
	
	
	$this->materiaprimarepo=$materiaprimarepo;
}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
	   $this->authorize('listar',new MateriaPrima());
	     $materiaprima=MateriaPrima::name($request->get('name'))->orderBy('nombre','ASC')->paginate(10);
	
	  return View('materiaprima.todamateriaprima',compact('materiaprima'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
	   $this->authorize('crear',new MateriaPrima());
	     return view('materiaprima.create');
		
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
        $this->authorize('crear',new MateriaPrima());
	   MateriaPrima::create([
            'nombre' => $request['nombre'],
            'existencia' => $request['existencia'],
            'precio' => $request['precio'],
        
        ]);

    return redirect('/materiaprima')->with('message','store');
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
	   $this->authorize('editar',new MateriaPrima());
	      $materiaprima = MateriaPrima::find($id);
        return view('materiaprima.edit', ['materiaprima'=>$materiaprima]);
    }

        public function cierre($id)
    {
        //
	   
	      $materiaprima = MateriaPrima::find($id);
        return view('materiaprima.cierre', ['materiaprima'=>$materiaprima]);
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
        $this->authorize('editar',new MateriaPrima());
	     $materiaprima = MateriaPrima::find($id);
	
        $materiaprima->fill($request->all());
        $materiaprima->save();

    return redirect('/materiaprima')->with('message','edit');
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
    
    public function prueba()
    {
        //
	  // dd('exito');
	   $materiaprima=$this->materiaprimarepo->findall();
	 //  dd($materiaprima);
	  return View('materiaprima.todamateriaprima',compact('materiaprima'));
	   //dd($materiaprima->nombre);
    }

    //realizando pruebas
    //public function Pruebavista(){          //Pruebavista funcion que contiene la vista

      //  return View('pruebasvistas/test');
    //}
}
