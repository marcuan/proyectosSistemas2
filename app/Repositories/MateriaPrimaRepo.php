<?php

namespace App\Repositories;
use App\MateriaPrima;
class MateriaPrimaRepo{
	public function findall(){
	return $MateriaPrima = MateriaPrima::all();
	}
}