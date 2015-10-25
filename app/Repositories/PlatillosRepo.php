<?php

namespace RED\Repositories;

use RED\Restaurante\Platillo;

class PlatillosRepo{
	public function findall(){
	return $Platillos = Platillo::all();
	}
}