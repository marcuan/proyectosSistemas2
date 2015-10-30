@extends('layouts.principal')

@section('content')
{!!Form::open()!!}
	<div class="container col-xs-12">
    <h3 class="title" selected="selected">Donadores</h3>
    <a href="../estudiantes" class="btn btn-danger">Regresar</a>
        <div class="info card">
            <div class="datos">
                <div class="personales"> 
                    <h5><strong>Nombre: </strong>{{$donor->donor_name}} {{$donor->donor_lastname}}</h5>
                    <h5><strong>Dirección: </strong>{{$donor->adress}}</h5>
                    <h5><strong>Correo: </strong>{{$donor->e_mail}}</h5>
                </div>
            </div>       
        </div>
        <h4>Donaciones Hechas</h4>
        <table class="table table-hover table-responsive">
            <thead>
                <th>Monto</th>
                <th>Descripción</th>
            </thead>
            @foreach($donations as $key => $donation)
            <tbody>
                <td>{{$donation->monto}}</td>
                <td>{{$donation->descripcion}}</td>
            </tbody>
            @endforeach
        </table>
    </div>
 {!!form::close()!!}

@stop