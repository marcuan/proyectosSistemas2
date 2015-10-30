@extends('layouts.principal')
@section('content')
    {!!Form::model($horario,['route'=>['horarios.update', $horario->id], 'method'=>'PUT'])!!}
        <div class="container col-xs-12">
        <h3 class="title" selected="selected">Horario</h3>
            <div class="form-grup">
        		{!!Form::label('Día:')!!}
        		{!!Form::select('dia', array('Lunes'=>'Lunes','Martes'=>'Martes','Miércoles'=>'Miércoles','Jueves'=>'Jueves','Viernes'=>'Viernes','Sábado'=>'Sábado','Domingo'=>'Domingo'),null,['class'=>'form-control'])!!}
        	</div><br>
        	<div class="form-grup">
        		{!!Form::label('Hora de Inicio:')!!}
        		{!!Form::time('hora_inicio',null,['class'=>'form-control','placeholder'=>'Ingrese la Hora de Inicio', 'required'])!!}
        	</div><br>
        	<div class="form-grup">
        		{!!Form::label('Descripcion:')!!}
        		{!!Form::time('hora_fin',null,['class'=>'form-control','placeholder'=>'Ingrese la Hora de Finalización', 'required'])!!}
        	</div><br>
            <div class="form-grup">
                {!!Form::label('Salón:')!!}
                {!!Form::text('salon',null,['class'=>'form-control','placeholder'=>'Ingrese el salón','required'])!!}
            </div><br>
            <div class="form-btn">
        	   {!!Form::submit('Guardar y Asignar Horario',['class'=>'btn btn-primary'])!!}
            </div>        
    {!!form::close()!!}
    </div>
@stop
