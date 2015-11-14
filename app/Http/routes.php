<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');


/**
 *	Rutas que requieren autenticación en el sistema.
 */
Route::group(['middleware' => 'auth'], function () {
	# Vista principal o tablero de usuario
	Route::get('tablero',  function () {
		return view('layouts.index');
	});

	/**
	 *	Ong
	 */
	Route::resource('users','Ong\UserController');
	Route::resource('donaciones','Ong\DonationController');
	Route::get('donaciones/create/{id}','Ong\DonationController@create');
	Route::resource('donantes','Ong\DonorController');
	Route::resource('actividades','Ong\ActivityController');
	Route::get('user/edit/{id}/{status}', 'Ong\UserController@cambiarEstatus');
	Route::get('user/privileges/{id}', 'Ong\UserController@listarPrivilegios');
	Route::post('user/savePrivileges', 'Ong\UserController@storePrivilegios');

	/**
	 *	User Authentication
	 */
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

	/**
	 *	Modulo Escuela
	 */
	Route::resource('estudiantes','Escuela\EstudianteController');
	Route::resource('maestros','Escuela\MaestroController');
	Route::resource('cursos','Escuela\CursoController');
	Route::get('asignacionestudiantes/{id}', 'Escuela\AsignEstController@asignar');
	Route::resource('asignacionestudiantes', 'Escuela\AsignacionEstudianteController');
	Route::get('asignacionmaestros/{id}', 'Escuela\AsignMaestController@asignar');
	Route::resource('asignacionmaestros', 'Escuela\AsignacionMaestroController');
	Route::get('desasignacionestudiantes/{id}', 'Escuela\DesasignEstController@desasignar');
	Route::resource('desasignacionestudiantes', 'Escuela\DesasignacionEstudianteController');
	Route::get('desasignacionmaestros/{id}', 'Escuela\DesasignMaestController@desasignar');
	Route::resource('desasignacionmaestros', 'Escuela\DesasignacionMaestroController');
	Route::get('cursoestudiantes/{id}', 'Escuela\CursoEstudiantesController@verestudiantes');
	Route::get('horarios/{id}', 'Escuela\CursoEstudiantesController@crearhorario');
	Route::resource('horarios', 'Escuela\HorarioController');
	Route::get('asignacioncursoestudiantes/{id}', 'Escuela\AsignCursoController@asignarestudiantes');
	Route::resource('asignacioncursos', 'Escuela\AsignacionCursoController');


	// direccion para reportes 
	
	Route::get('reposiEstu',function ()
	{
		// llega a la vista de los reportes 
		return view('\Escuela\estudiante\Reporte');
	});
	Route::get('reposiCurso',function ()
	{
		// llega a la vista de los reportes 
		return view('\Escuela\curso\Reportes');
	});
	Route::get('reposiMaestro',function ()
	{
		// llega a la vista de los reportes 
		return view('\Escuela\maestro\Reporte');
	});


	 

	

	/**
	 *	Modulo Restaurante
	 */
	Route::resource('materiaprima','Restaurante\MateriaPrimaController');
	Route::get('/comprasproveedor/{id}',['as'=>'compras','uses'=>'Restaurante\ComprasController@proveedor']);
	Route::resource('platillo','Restaurante\PlatilloController');
	Route::get('temporadas/{id}', 'Restaurante\PlatilloController@mostrarplatillotemporada');
	Route::resource('temporada','Restaurante\TemporadaController');
	Route::resource('clientes', 'Restaurante\ClienteController');
	Route::resource('compra','Restaurante\ComprasController');
	Route::resource('detallecompra', 'Restaurante\DetalleCompraController');
	Route::get('cierre/{id}', 'Restaurante\MateriaPrimaController@cierre');
	Route::get('CrearVenta/{id}', 'Restaurante\DetalleVentaController@CrearVenta');
	Route::resource('detalleventa', 'Restaurante\DetalleVentaController');
	Route::get('api/dropdown', function(){
		$id = Input::get('platilloselect');
		$subcategory = RED\Restaurante\Platillo::where('id', '=',$id);
		return Response::make($subcategory->get(['id','precio']));
	});
	Route::get('search', function(){
		$opcionmateria= RED\Restaurante\MateriaPrima::all();
		return view('detallecompra.create', compact('opcionmateria'));
	});
	Route::get('search/results', function(){
		$id = Input::get('nombre');
		$materia = RED\Restaurante\MateriaPrima::where('nombre', 'LIKE', '%'.$id.'%')->take(10)->get();
		return Response::json($materia);
	});
	/**
	 *	Modulo Despensa
	 */
	Route::resource ('venta','Despensa\VentasController');    
	//Route::resource ('detalleventa','Despensa\DetalleVentaController');
	Route::resource('inventario','Despensa\InventarioController');
	Route::resource('producto','Despensa\productosController');
	Route::resource('proveedores', 'Despensa\proveedoresController');
	Route::resource('consignaciones', 'Despensa\ConsignacionController');
	Route::resource('detalleconsignacion', 'Despensa\DetalleConsignacionController');
	Route::get('/consignacionproveedor/{id}',['as'=>'consignacion','uses'=>'Despensa\ConsignacionController@proveedor']);
	
	//Route::resource('proveedores', 'Despensa\proveedoresController@getIndex');
	Route::controller('datatables', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
		]);
});
