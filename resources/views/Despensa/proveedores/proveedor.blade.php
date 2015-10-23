 @extends('layouts.master')

 @section('content')

	 <h1>Proveedores</h1>
	 @foreach($proveedor as $proveedores) 
            <p>Nombre: {{ $proveedores->nombre }}</p>
	        <p>Telefono: {{ $proveedores->telefono }}</p>
        	<p>Direccion: {{ $proveedores->direccion }}</p>
        	<hr>
        	
    @endforeach

 @stop