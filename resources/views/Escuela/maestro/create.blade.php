@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'maestros.store', 'method'=>'POST', 'files'=>true])!!}
       
        <div class="container col-xs-12">
        <h3 class="title" selected="selected">Maestros</h3>
        <a href="/maestros" class="btn btn-danger">Regresar</a>
         
            <div class="form-grup">
            <br>
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
                {!!Form::email('correo',null,['class'=>'form-control','placeholder'=>'Ingrese Correo','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Genéro:')!!}
                {!!Form::select('genero_id',array('1'=>'Femenino','2'=>'Masculino'),null,['class'=>'form-control'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Telefono:')!!}
                {!!Form::tel('numero_telefono',null,['class'=>'form-control','placeholder'=>'Ingrese Telefono ej. 54545454','required','pattern'=>'[0-9]{8}'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Seleccione foto de perfil:')!!}
                {!!Form::file('path')!!}
            </div><br>
            <div class="form-btn">
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
        
             {!!form::close()!!}
     </div>

@stop
