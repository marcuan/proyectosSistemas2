@extends('layouts.principal')

@section('content')
    <p>Platillos</p>
	
    @foreach($temporada->platillos as $platillos)  
            <p>Nombre: {{ $platillos->nombre }}</p>
	        <p>Precio: {{ $platillos->precio }}</p>
        	<p>Descripcion: {{ $platillos->descripcion }}</p>
    @endforeach


@stop