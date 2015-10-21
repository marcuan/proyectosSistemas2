@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'estudiantes.store', 'method'=>'POST'])!!}
        <h3>Estudiantes</h3>
            <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre_estudiante',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre estudiante','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Apellido:')!!}
                {!!Form::text('apellido_estudiante',null,['class'=>'form-control','placeholder'=>'Ingrese Apellido estudiante','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Fecha de Nacimiento:')!!}
                {!!Form::date('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Nacimiento','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Dirección:')!!}
                {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Correo Electrónico:')!!}
                {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingrese Correo Electrónico','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Género:')!!}
                {!!Form::select('genero_id', array('1'=>'Femenino','2'=>'Masculino'),null,['class'=>'form-control'])!!}
            </div><br>
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}

@stop
