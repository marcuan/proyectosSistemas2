@extends('layouts.master')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado</strong> Se ha creado nueva materia prima.
</div>
@endif
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>Precio</th>
                
            </thead>
             @foreach($materiaprima as $dato)
            <tbody>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->existencia}}</td>
                <td>{{$dato->precio}}</td>
                 </tbody>
            @endforeach
        </table>
    </div>
@stop