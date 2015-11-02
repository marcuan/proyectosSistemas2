@extends('layouts.principal')
@section('content')
    {!!Form::model($activity,['route'=>['actividades.update', $activity->id], 'method'=>'PUT'])!!}
        
       <div class="container col-xs-12">
        <h3 class="title" selected="selected">Actividades</h3>

            <div class="form-grup">
                {!!Form::label('Nombre de la actividad:')!!}
                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese Monto de Donación','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Descripción:')!!}
                {!!Form::text('description',null,['class'=>'form-control','placeholder'=>'Ingrese Descripción de Donación','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Dirección:')!!}
                {!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingrese ID del Donador','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Capacidad:')!!}
                {!!Form::text('capacity',null,['class'=>'form-control','placeholder'=>'Ingrese ID del Donador','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Fecha de Inicio:')!!}
                {!!Form::date('date_start',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Inicio','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Fecha de Fin:')!!}
                {!!Form::date('date_end',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Inicio','required'])!!}
            </div><br>
            <div class="form-btn">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
    {!!Form::open(['route'=>['actividades.destroy', $activity->id], 'method'=>'DELETE'])!!}
    {!!form::close()!!}
    </div>
@stop