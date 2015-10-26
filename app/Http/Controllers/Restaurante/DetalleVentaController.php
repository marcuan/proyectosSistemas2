<?php

namespace RED\Http\Controllers\Restaurante;

use Illuminate\Http\Request;
use RED\Restaurante\DetalleVenta;
//para temporadas¿¿¿¿¿¿????????
use RED\Restaurante\Temporada;
use RED\Repositories\TemporadaRepo;

//Para platillos// ¿¿¿¿¿¿¿¿??????????
use RED\Repositories\PlatillosRepo;
use RED\Restaurante\Platillo;

use Resources;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class DetalleVentaController extends Controller
{

     //mostrando temporadas
    protected $temporadarepo;
    public $opciontemporada;

    //mostrando platillos // para desplegar en combo todos los platillos (modificado)
    protected $listaplatillos;
    public $opcionesplatillos;  
    
    ///no se porque uso PlatillosRepo
    public function __construct(PlatillosRepo $temporadarepo){

        $this->temporadarepo=$temporadarepo;
    }

    //usando el mismo combo box a ver si no da problemas
    public function __construct(PlatillosRepo $listaplatillos)
    {
        $this->listaplatillos=$listaplatillos;
    }

    ////y esto no se para que sirve?
    //depliega platillos por temporada¿?
    public function mostrarplatillotemporada($id)
    {
        $temporada = Temporada::find($id);
        return View('platillo.platillotemporada',compact('temporada'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $opciontemporada = Temporada::all()->lists('nombre','id');
        $opcionesplatillos = Platillo::all()->lists('nombre', 'id');  /// modificado para platillos
        return view('detalleventa.create', compact('opciontemporada'));
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
        DetalleVenta::create([
            'temporada_id' => $request['temporada_id'],
            'nombre' => $request['nombre'];                 //aquí se supone se deplegaran los platillos
            'cantidad' => $request['cantidad'],
            'total' => $request['total'],
            'tiendaorestaurante' => $request['tiendaorestaurante'],
            ]);

        return redirect('/detalleventa')->with('message','store');
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
        $detalleventa = DetalleVenta::find($id);
        return view('detalleventa.edit', ['detalleventa'=>$DetalleVenta]);
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
    }
}
