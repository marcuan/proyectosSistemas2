@extends('layouts.principal')

<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Operación Exitosa!</strong> Temporada creada.
</div>
@endif

@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Operación Exitosa!</strong> Curso editado exitosamente.
</div>
@endif

@section('content')

<a href="../public/temporada/create" class="btn btn-danger">Nueva Temporada</a>
    <div class="container">
        <table class="table">
            <thead>
            <h3>Temporada</h3>
                <th>Nombre</th>
            </thead>
            @foreach($temporada as $temporada)
            <tbody>
                <td>{{$temporada->nombre}}</td>
  		<td>{!!link_to_route('temporada.edit', $title = 'Editar', $parameters = $temporada->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>

@stop
