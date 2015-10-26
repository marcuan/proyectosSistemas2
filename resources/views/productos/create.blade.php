@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'proveedores.store', 'method'=>'POST'])!!}
        <h3>Proveedores</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre Proveedor','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Telefono:')!!}
                {!!Form::number('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese Telefono','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Dirección:')!!}
                {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion','required'])!!}
            </div>
            <div class="form-btn">
                {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
        
    {!!form::close()!!}
    </div>

@stop
