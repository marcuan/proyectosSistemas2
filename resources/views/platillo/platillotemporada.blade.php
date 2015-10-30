@extends('layouts.principal')



@section('content')
	
    <div class="container">
        <table class="table">
            <thead>
               
                <th>nombre</th>
                <th>precio</th>
                <th>descripcion</th>
                
            </thead>

             @foreach($temporada->platillos as $platillos)  
            <tbody>
                
                <td>{{$platillos->nombre}}</td>
                <td>{{$platillos->precio}}</td>
                <td>{{$platillos->descripcion}}</td>
               
            </tbody>
            @endforeach

        </table>
    </div>
@stop