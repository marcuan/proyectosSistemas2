@extends('layouts.principal')
@section('content')
    {!!Form::model($donation,['route'=>['donaciones.update', $donation->id], 'method'=>'PUT'])!!}
        
       <div class="container col-xs-12">
        <h3 class="title" selected="selected">Donaciones</h3>

            <div class="form-grup">
                {!!Form::label('Monto:')!!}
                {!!Form::text('monto',null,['class'=>'form-control','placeholder'=>'Ingrese Monto de Donación','step'=>'0.01','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Descripción:')!!}
                {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese Descripción de Donación','required'])!!}
            </div><br>
            <div class="form-btn">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
    {!!Form::open(['route'=>['donaciones.destroy', $donation->id], 'method'=>'DELETE'])!!}
        {!!Form::submit('Inhabilitar Donación',['class'=>'btn btn-danger'])!!}
    {!!form::close()!!}
    </div>
@stop