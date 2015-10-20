@extends('layouts.principal')
@section('content')
    {!!Form::model($estudiante,['route'=>['estudiantes.update', $estudiante->id], 'method'=>'PUT'])!!}
        <h3>Estudiantes</h3>
            <div class="container">
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
                {!!Form::date('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Nacimiento','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Dirección:')!!}
                {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Correo Electrónico:')!!}
                {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingrese Correo Electrónico','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Género:')!!}
                {!!Form::select('genero_id', array('1'=>'Femenino','2'=>'Masculino'),null,['class'=>'form-control'])!!}
            </div>
        
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    {!!form::close()!!}

@stop
