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

/******************
  MODULO ESCUELA
******************/
Route::resource('estudiantes','Escuela\EstudianteController');
Route::resource('maestros','Escuela\MaestroController');
Route::resource('cursos','Escuela\CursoController');

/******************/

/******************************
  MODULO CAFETERÍA/RESTAURANTE
******************************/

Route::get('/totalmateriaprima/',['as'=>'materiaprima','uses'=>'Restaurante\MateriaPrimaController@prueba']);
//Rutas Compras
//Ruta para obtener las compras de un proveedor
Route::get('/comprasproveedor/{id}',['as'=>'compras','uses'=>'Restaurante\ComprasController@proveedor']);
//Rutas para todos los platillos
Route::get('platillo', 'platilloController@mostrar');
//Rutas para platillos de una temporada
Route::get('platillo/{id}', 'Restaurante\PlatilloController@mostrarplatillotemporada');
//Rutas para mostrar las temporadas
Route::get('temporada', 'Restaurante\TemporadaController@mostrar');

/*****************************/