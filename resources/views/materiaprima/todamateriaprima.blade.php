@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado</strong> Se ha creado nueva materia prima.
</div>
@endif
@section('content')
 <a href="../public/materiaprima/create" class="btn btn-danger">Crear Materia</a>
   
   <div class="container">
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>Precio</th>
			  <th>Operacion</th>
                
            </thead>
             @foreach($materiaprima as $dato)
            <tbody>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->existencia}}</td>
                <td>{{$dato->precio}}</td>
			 <td>{!!link_to_route('materiaprima.edit', $title = 'Editar', $parameters = $dato->id, $attributes = ['class'=>'btn btn-primary']);!!}
                 </tbody>
            @endforeach
        </table>
    </div>
@stop