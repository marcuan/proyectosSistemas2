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


Route::get('/totalmateriaprima/',['as'=>'materiaprima','uses'=>'materiaprimaController@prueba']);


///primera vista de prueba
//materiaprimaController ---> es la clase controlador y dentro llama la funcion Pruebavista
//Route::get('Prueba', 'materiaprimaController@Pruebavista');   //si se pone solo Prueba --> se llama en la carpeta publica en /ModuloCafeteria/public/Prueba
//{

//	return view('PruebasVistas/test');
//})
