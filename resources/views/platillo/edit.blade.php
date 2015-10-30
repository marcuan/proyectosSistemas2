@extends('layouts.principal')

@section('content')
  {!!Form::model($platillo,['route'=>['platillo.update', $platillo->id], 'method'=>'PUT'])!!}
        <h3>Platillo</h3>
       <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Temporada:')!!}
                {!!Form::text('temporada_id',null,['class'=>'form-control','placeholder'=>'Ingrese temporada ','required',])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre platillo','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Precio Unitario:')!!}
                {!!Form::number('precio',null,['class'=>'form-control','placeholder'=>'Ingrese precio','required','step' => 'any'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('descripcion:')!!}
                {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese descripcion','required'])!!}
            </div><br>
            <div class="form-btn">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
    </div>
@stop
