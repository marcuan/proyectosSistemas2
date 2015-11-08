@extends('layouts.principal')
@section('content')
        
    {!!Form::model($temporada,['route'=>['temporada.update', $temporada->id], 'method'=>'PUT'])!!}
        <h3>Temporadas</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Nombre de la Temporada:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de la Temporada', 'required'])!!}
            </div><br>
	<div class="form-grup">
                {!!Form::label('Fecha de Inicio:')!!}
                {!!Form::Date('fecha_inicio',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Inicio','required'])!!}
            </div><br>
	<div class="form-grup">
                {!!Form::label('Fecha de Finalización:')!!}
                {!!Form::Date('fecha_fin',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Finalización','required'])!!}
            </div><br>
        <div class="form-btn">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
    </div>
@stop
