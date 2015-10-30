<?php

namespace RED\Repositories;

use RED\Restaurante\MateriaPrima;

class MateriaPrimaRepo{
	public function findall(){
	return $MateriaPrima = MateriaPrima::all();
	}
}