@extends('layouts.master')
@section('content')
    {!!Form::open(['route'=>'materiaprima.store', 'method'=>'POST'])!!}
        <h3>Materia Prima</h3>
       <div class="container">
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre_materia',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de Materia ','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Existencia:')!!}
                {!!Form::number('existencia',null,['class'=>'form-control','placeholder'=>'Ingrese Existencia','required'])!!}
            </div>
        
            <div class="form-grup">
                {!!Form::label('Precio:')!!}
                {!!Form::number('precio',null,['class'=>'form-control','placeholder'=>'Ingrese precio','required','step' => 'any'])!!}
            </div>
      
            
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
         </div>
    {!!form::close()!!}

@stop
