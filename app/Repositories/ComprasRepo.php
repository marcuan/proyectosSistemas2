<?php
namespace App\Repositories;
use App\Compra;
class ComprasRepo{
	public function findall(){
		//Obtener todas las compras 
	return $Compra = Compra::all();
	}
}