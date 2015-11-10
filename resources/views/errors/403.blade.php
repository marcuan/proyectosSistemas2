@extends('layouts.principal')
<?php $message=Session::get('message')?>

@section('content')
    <div class="container col-xs-12">
        <h3 class="title" selected="selected">Error</h3>
        <p>No esta autorizado para acceder a esta sección, por favor contacte a un administrador para verificar sus permisos en la aplicación.</p>
    </div>
@stop