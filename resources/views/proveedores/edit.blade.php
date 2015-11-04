@extends('layouts.principal')
@section('content')
        
    {!!Form::model($proveedores,['route'=>['proveedores.update', $proveedores->id], 'method'=>'PUT'])!!}
        <h3>Proveedores</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Proveedor:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre del Proveedor', 'required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Telefono:')!!}
                {!!Form::number('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese Telefono', 'required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Direccion:')!!}
                {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion','required'])!!}
            </div><br>
        <div class="form-btn">
           {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		
        </div>
    {!!form::close()!!}
                {!!Form::open(['route'=>['proveedores.destroy', $proveedores->id], 'method'=>'DELETE'])!!}
                {!!Form::submit('Inhabilitar Proveedor',['class'=>'btn btn-danger'])!!}
                {!!form::close()!!}
    </div>
@stop