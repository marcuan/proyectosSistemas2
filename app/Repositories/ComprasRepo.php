<?php

namespace RED\Repositories;

use RED\Restaurante\Compra;

class ComprasRepo{
	public function findall(){
		//Obtener todas las compras 
	return $Compra = Compra::all();
	}
}