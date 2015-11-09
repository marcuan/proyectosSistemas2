@extends('layouts.principal')
@section('content')
<div class="container col-xs-12">
    {!!Form::open(['route'=>'temporada.store', 'method'=>'POST'])!!}
        <h3 class="title" selected="selected">Temporadas</h3>
        	<div class="form-grup">
        		{!!Form::label('Nombre:')!!}
        		{!!Form::text('nombre_temporada',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de la temporada', 'required'])!!}
        	</div><br> 
		<div class="form-grup">
                	{!!Form::label('Fecha de Inicio:')!!}
                	{!!Form::Date('fecha_inicio',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Inicio','required'])!!}
            	</div><br>    
		<div class="form-grup">
               		{!!Form::label('Fecha de Finalizacion:')!!}
                	{!!Form::Date('fecha_fin',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Finalizacion','required'])!!}
            	</div><br>  
		<div class="form-btn">
        	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		</div>
    {!!form::close()!!}
 </div>
@stop
