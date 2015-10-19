<?php

namespace RED\Repositories;

use RED\Restaurante\Proveedore;

class ProveedorRepo{
	public function findall(){
	return $proveedor = Proveedore::all();//Buscar todos los proveedores
	}
	public function find($id){
	return $proveedor = Proveedore::find($id); //Obtener el proveedor con un id especifico
	}
}