@extends('layouts.principal')


@section('content')

<div class="container col-xs-12">

        <hr>
        <div class="row administrativa">
            <div class="ad1">
                <h2>Área Administrativa</h2>
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <div class="ad2 row">
            <div class="col-sm-6">
                {!! Html::image('images/ong.png', "Imagen no encontrada", ['title' => 'despensa']) !!}
            </div>
            <div class="col-sm-6">
                {!! Html::image('images/escuela.png', "Imagen no encontrada", ['title' => 'escuela']) !!}
                <h2></h2>
            </div>
            <div class="col-sm-6">
                {!! Html::image('images/restaurante.png', "Imagen no encontrada", ['title' => 'restaurante']) !!}
               
            </div>
            <div class="col-sm-6">
                {!!Html::image('images/despensa.png', "Imagen no encontrada", ['title' => 'despensa']) !!}

                
            </div> 
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; URL -proyectos-</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->    

@stop