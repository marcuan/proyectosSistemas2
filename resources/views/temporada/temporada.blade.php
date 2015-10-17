@extends('layouts.master')

@section('content')
    <p>Temporadas</p>
    @foreach($temporada as $temporadas)
            <p>Nombre: {{ $temporadas->nombre }}</p>	        
    @endforeach
@stop
