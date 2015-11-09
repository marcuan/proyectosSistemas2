@extends('layouts.principal')

@section('content')
{!!Form::open(['route'=>'detallecompra.store', 'method'=>'POST'])!!}
        
 <!--<a href="/materiaprima/create" class="btn btn-danger">Crear Materia</a>-->
   <div class="container-fluid" ng-app="RED">
        <div class="row" ng-controller="SearchCtrl">
            <!--@{{searchInput}}-->
            <label>Buscar Materia Prima:</label>
            <input type="text" class="form-control" name="valor" id="valor" value="Materia Prima" ng-model="searchInput" ng-change="search()" autofocus>        
            <div class="list-group">
                <a href="#" class="list-group-item" ng-repeat="materia in materia">
                        <h4 class="list-group-item-heading">
                        @{{materia.nombre}}
                        </h4>
                </a>
            </div>
            <div class="container">
                
                <div class="form-grup">
                        {!!Form::label('Id:')!!}
                    <!--<input type="text" name="valor1" class="form-control" id="valor1" selected disabled="" required>-->
                    <input type="text" name="valor1" class="form-control" id="valor1" value="">
                </div>
                <div class="form-grup">
                    {!!Form::label('Materia Prima:')!!}
                    <input type="text" name="valor2" class="form-control" id="valor2" selected disabled="" required>
                </div>
                <div class="form-grup">
                        {!!Form::label('Cantidad:')!!}
                    {!!Form::text('cantidad',null,['class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'])!!}
                </div>
                <div class="form-grup">
                  {!!Form::label('Precio unitario (Q):')!!}
                    {!!Form::number('costo',0,['class'=>'form-control','placeholder'=>'Ingrese Costo','required','step' => 'any'])!!}
                </div>

                {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
            </div>

        </div>
    </div>

{!!form::close()!!}

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
<script type="text/javascript">
    var RED=angular.module('RED',[]);
    RED.controller('SearchCtrl', function($scope, $http){
        $scope.search = function(){ 
            $http.get('search/results',{
                params:{nombre: $scope.searchInput}
            }).success(function (data){
                $scope.materia=data;

                $.each(data, function(index, element) {
                      
                      document.getElementById('valor1').value= element.id;
                      document.getElementById('valor2').value= element.nombre;

                  });
            });
        };

    });
</script> 

@stop
