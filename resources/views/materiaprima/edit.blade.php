@extends('layouts.principal')
@section('content')
  {!!Form::model($materiaprima,['route'=>['materiaprima.update', $materiaprima->id], 'method'=>'PUT'])!!}
        <h3>Materia Prima</h3>
       <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de Materia ','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Existencia:')!!}
                {!!Form::number('existencia',null,['class'=>'form-control','placeholder'=>'Ingrese Existencia','required'])!!}
            </div>
        
            <div class="form-grup">
                {!!Form::label('Precio Unitario (Q):')!!}
                {!!Form::number('precio',null,['class'=>'form-control','placeholder'=>'Ingrese precio','required','step' => 'any'])!!}
            </div>
      
            <div class="form-btn">
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
         </div>
    {!!form::close()!!}

@stop
