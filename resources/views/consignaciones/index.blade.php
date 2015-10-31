@extends('layouts.principal')

<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Consignacion creada exitosamente.
</div>
@endif

@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Consignacion editada exitosamente.
</div>
@endif

@section('content')

    <h3 class="title" selected="selected">Consignaciones</h3>
    <a href="consignaciones/create" class="btn btn-danger">Crear Consignaciones</a>

    <div class="container">
        {!!Form::open(['rout'=>'consignacion.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
        <div class="form-group">
            <label for="exampleInputName2">Codigo :        </label>
            {!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
        </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>

        <div class="form-group">
            <label for="exampleInputName2">Fecha :        </label>
            {!!Form::date('fechaInicial',null,['class'=>'form-control','placeholder'=>'Ingrese fecha Inicial', 'required'])!!}        
        </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
        {!!Form::close()!!}

        <table class="table">
            <thead>
				<th>Codigo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Observaciones</th>
                <th>Proveedor</th>
            </thead>
            @foreach($consignacion as $consignaciones)
			
		{{-- */$proveedorComp = RED\Despensa\Proveedore::find($consignaciones->proveedores_id)/* --}}
			
                <tbody>
                    <td>{{$consignaciones->codigo}}</td>
					<td>{{$consignaciones->fechaInicial}}</td>
                    <td>{{$consignaciones->fechaFinal}}</td>
                    <td>{{$consignaciones->detalleConsignacion}}</td>
					<td>{{$proveedorComp->nombre}}</td>
                    <td> <td>{!!link_to_route('consignaciones.show', $title = 'Ver Detalles', $parameters = $consignaciones->id, $attributes = ['class'=>'btn btn-primary']);!!}
					
						{!!link_to_route('consignaciones.edit', $title = 'Editar', $parameters = $consignaciones->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
                </tbody>
			
            @endforeach
        </table>
    </div>
@stop