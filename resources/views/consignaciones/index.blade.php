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

        <table class="table">
            <thead>
				<th>Codigo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Observaciones</th>
                <th>Proveedor</th>
            </thead>
            @foreach($consignacion as $consignaciones)
                <tbody>
                    <td>{{$consignaciones->codigo}}</td>
					<td>{{$consignaciones->fechaInicial}}</td>
                    <td>{{$consignaciones->fechaFinal}}</td>
                    <td>{{$consignaciones->detalleConsignacion}}</td>
                    <td>{{$consignaciones->proveedores_id}}</td>
                    <td> <td>{!!link_to_route('consignaciones.show', $title = 'Ver Detalles', $parameters = $consignaciones->id, $attributes = ['class'=>'btn btn-primary']);!!}
						{!!link_to_route('consignaciones.edit', $title = 'Editar', $parameters = $consignaciones->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
                </tbody>
            @endforeach
        </table>
    </div>
@stop