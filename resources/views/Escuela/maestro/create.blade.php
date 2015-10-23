@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'maestros.store', 'method'=>'POST'])!!}
        <h3>Maestros</h3>
       <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre_maestro',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre Maestro','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Apellido:')!!}
                {!!Form::text('apellido_maestro',null,['class'=>'form-control','placeholder'=>'Ingrese Apellido Maestro','required'])!!}
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
                {!!Form::label('Correo:')!!}
                {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingrese Correo','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Genéro:')!!}
                {!!Form::select('genero_id',array('1'=>'Femenino','2'=>'Masculino'),null,['class'=>'form-control'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Telefono:')!!}
                {!!Form::text('numero_telefono',null,['class'=>'form-control','placeholder'=>'Ingrese Telefono','required'])!!}
            </div><br>
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
         </div>
    {!!form::close()!!}

@stop
