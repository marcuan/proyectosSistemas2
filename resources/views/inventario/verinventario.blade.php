@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado</strong> Se ha creado
</div>
@endif
@section('content')
<strong>Inventario!</strong> Sin Existencias.
   
   <div class="container">
      
	      <table class="table">
         
        </table>
	   
    </div>
@stop