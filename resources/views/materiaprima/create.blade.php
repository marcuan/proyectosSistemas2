@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'materiaprima.store', 'method'=>'POST'])!!}
        <h3>Materia Prima</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de Materia ','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Existencia:')!!}
                {!!Form::number('existencia',null,['class'=>'form-control','placeholder'=>'Ingrese Existencia','required'])!!}
            </div><br>
        
            <div class="form-grup">
                {!!Form::label('Precio unitario:')!!}
                {!!Form::number('precio',null,['class'=>'form-control','placeholder'=>'Ingrese precio','required','step' => 'any'])!!}
            </div><br>
      
            <div class="form-btn">
                {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
         </div>
    {!!form::close()!!}

@stop
