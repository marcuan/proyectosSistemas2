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
	Route::resource('donantes','Ong\DonorController');

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


	// direccion para reportes 
	
	Route::get('reposiEstu',function ()
	{
		//return "aca llamar a la vista ReporteEstu en resouse /views/escuela/estudiante/Reporte.php";
		// llega a la vista de los reportes 
		return view('\Escuela\estudiante\Reporte');
	});

	 // ejemplo 

	

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

	/**
	 *	Modulo Despensa
	 */
	Route::resource ('venta','Despensa\VentasController');
	Route::resource('inventario','Despensa\InventarioController');
	Route::resource('producto','Despensa\productosController');
	Route::resource('proveedores', 'Despensa\proveedoresController');
	Route::resource('consignaciones', 'Despensa\ConsignacionController');
	Route::resource('detalleconsignacion', 'Despensa\DetalleConsignacionController');
	Route::get('/consignacionproveedor/{id}',['as'=>'consignacion','uses'=>'Despensa\ConsignacionController@proveedor']);
	
	//Route::resource('proveedores', 'Despensa\proveedoresController@getIndex');
});
