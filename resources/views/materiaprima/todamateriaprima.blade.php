@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado</strong> Se ha creado nueva materia prima.
</div>
@endif
@section('content')
<!-- Vista -> Cuadro para buscar platillo-->
    {!! Form::open(['href' => '../public/materiaprima', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Materia Prima']) !!}
    </div>
        <button type="submit" class="btn btn-primary">Buscar</button> 
    {!! Form::close() !!}
    <!-- .....  -->

 <a href="/materiaprima/create" class="btn btn-danger">Crear Materia</a>
   <div class="container-fluid">
        <table class="table table-condensed">
            <thead>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>Precio (Q)</th>
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
		  {!!$materiaprima->render()!!}
        </table>
	    {!!$materiaprima->render()!!}
    </div>
@stop