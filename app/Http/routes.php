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

Route::get('/', function () {
    return view('welcome');
});


///Rutas cafeteria
//Rutas materia prima
Route::get('/totalmateriaprima/',['as'=>'materiaprima','uses'=>'materiaprimaController@prueba']);

//Rutas Compras
//Ruta para obtener las compras de un proveedor
Route::get('/comprasproveedor/{id}',['as'=>'compras','uses'=>'comprasController@proveedor']);

//Rutas para todos los platillos
Route::get('platillo', 'platilloController@mostrar');

//Rutas para platillos de una temporada
Route::get('platillo/{id}', 'platilloController@mostrarplatillotemporada');

//Rutas para mostrar las temporadas
Route::get('temporada', 'temporadaController@mostrar');