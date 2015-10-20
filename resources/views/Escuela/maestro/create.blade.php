@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'maestros.store', 'method'=>'POST'])!!}
        <h3>Maestros</h3>
        <div class="form-grup">
            {!!Form::label('Nombre:')!!}
            {!!Form::text('nombre_maestro',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre Maestro'])!!}
        </div>
        <div class="form-grup">
            {!!Form::label('Apellido:')!!}
            {!!Form::text('apellido_maestro',null,['class'=>'form-control','placeholder'=>'Ingrese Apellido Maestro'])!!}
        </div>
        <div class="form-grup">
            {!!Form::label('Fecha de Nacimiento:')!!}
            {!!Form::text('fecha_maestro',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Nacimiento'])!!}
        </div>
        <div class="form-grup">
            {!!Form::label('Dirección:')!!}
            {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion'])!!}
        </div>
        <div class="form-grup">
            {!!Form::label('Correo:')!!}
            {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingrese Correo'])!!}
        </div>
        
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
    {!!form::close()!!}

@stop
