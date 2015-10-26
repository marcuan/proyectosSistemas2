<?php

namespace RED\Repositories;

use RED\Despensa\Inventario;

class InventarioRepo{
	public function findall(){
	return $Inventario = Inventario::all();
	}
}