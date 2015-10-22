@extends('layouts.principal')

@section('content')
    <p>Platillos</p>
	@foreach($platillo as $platillos) 
            <p>Nombre: {{ $platillos->nombre }}</p>
	        <p>Precio: {{ $platillos->precio }}</p>
        	<p>Descripcion: {{ $platillos->descripcion }}</p>
        	<p>Temporada: {{ $platillos->temporada_id }}</p>
    @endforeach

@stop