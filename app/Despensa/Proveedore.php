<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    //Atributo necesario para modelos
    	 protected $table = 'Proveedores';

    	 protected $fillable = [
            'id',
    	 	'nombre',
    	 	'telefono',
    	 	'direccion'];
	
	public function scopeName($query, $name){

    	if (trim($name) != "")
    	{
    		return $query->where(\DB::raw("CONCAT(nombre)"),"LIKE","%$name%");	
    	}
    }
	 
		//Funcion para obtener las compras de un proveedor
	public function compras(){
		 //Se tiene una relacion de 1:n 
		 //Utilizando Eloquent ORM, se agrega el atributo proveedores_id ya que con ese nombre
		 //se encuentra en la base de datos, si no se agregara El orm asume proveedore_id
     return $this->hasMany('RED\Compra','proveedores_id');
		 
	 }
}
