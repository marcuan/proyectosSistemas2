@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'horarios.store', 'method'=>'POST'])!!}
    {!!Form::text('curso',$curso->id,['class'=>'hidden', 'id'=>'curso'])!!}
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
    <h4>Horarios del Curso</h4>
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead>
                <th>Día</th>
                <th>Hora de Inicio</th>
                <th>Hora de Finalización</th>
                <th>Salón </th>
            </thead>
            @foreach($horarios as $horario)
            <tbody>
                <td>{{$horario->dia}}</td>
                <td><?php echo date('g:i a', strtotime($horario->hora_inicio)); ?></td>
                <td><?php echo date('g:i a', strtotime($horario->hora_fin)); ?></td>
                <td>{{$horario->salon}}</td>
            </tbody>
            @endforeach
        </table>
        </div>
    </div>
@stop
