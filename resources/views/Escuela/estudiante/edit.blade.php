@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'estudiantes.update', 'method'=>'POST'])!!}
        <h3>Estudiantes</h3>
        <div class="form-grup">
            {!!Form::label('Nombre:')!!}
            {!!Form::text('nombre_estudiante',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre estudiante','required'])!!}
        </div>
        <div class="form-grup">
            {!!Form::label('Apellido:')!!}
            {!!Form::text('apellido_estudiante',null,['class'=>'form-control','placeholder'=>'Ingrese Apellido estudiante','required'])!!}
        </div>
        <div class="form-grup">
            {!!Form::label('Fecha de Nacimiento:')!!}
            {!!Form::text('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Nacimiento','required'])!!}
        </div>
        <div class="form-grup">
            {!!Form::label('Dirección:')!!}
            {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion','required'])!!}
        </div>
        <div class="form-grup">
            {!!Form::label('Correo Electrónico:')!!}
            {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingrese Correo Electrónico','required'])!!}
        </div>
        
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
    {!!form::close()!!}

@stop
