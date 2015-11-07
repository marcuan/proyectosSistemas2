@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'actividades.store', 'method'=>'POST'])!!}
       
        <div class="container col-xs-12">
        <h3 class="title" selected="selected">Actividades</h3>

            <div class="form-grup">
                {!!Form::label('Nombre de la actividad:')!!}
                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese nombre del evento    ','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Descripción:')!!}
                {!!Form::text('description',null,['class'=>'form-control','placeholder'=>'Ingrese descripción del evento','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Dirección:')!!}
                {!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingrese dirección del evento','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Capacidad:')!!}
                {!!Form::text('capacity',null,['class'=>'form-control','placeholder'=>'Ingrese capacidad','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Fecha de Inicio:')!!}
                {!!Form::date('date_start',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Inicio','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Fecha de Fin:')!!}
                {!!Form::date('date_end',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Fin','required'])!!}
            </div><br>
            <div class="form-btn">
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
            
             {!!form::close()!!}
     </div>

@stop