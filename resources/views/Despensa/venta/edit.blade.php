@extends('layouts.principal')
@section('content')
        
    {!!Form::model($venta,['route'=>['venta.update', $venta->idVenta], 'method'=>'PUT'])!!}
        <h3>Ventas</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Cliente:')!!}
                {!!Form::number('clientes_id',null,['class'=>'form-control','placeholder'=>'Ingrese Cliente','required'])!!}
            </div><br>
        <div class="form-btn">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
    </div>
@stop
