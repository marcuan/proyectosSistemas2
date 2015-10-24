<?php

namespace RED\Repositories;

use RED\Restaurante\Temporada;

class TemporadaRepo{
	public function findall(){
	return $temporada = Temporada::all();//Buscar todos los proveedores
	}
	public function find($id){
	return $temporada = Temporada::find($id); //Obtener el proveedor con un id especifico
	}
}