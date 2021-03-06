<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>::Cafe RED::</title> 

        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
		{!!Html::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')!!}
	{!!Html::style('css/style.css')!!}
	{!!Html::style('https://fonts.googleapis.com/css?family=Lato:400,700')!!}
		 {!!Html::script('https://code.jquery.com/jquery-1.11.3.min.js')!!}
	{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')!!}
	{!!Html::script('js/jquery.metisMenu.js')!!}    
	{!!Html::script('js/script.js')!!}
	<link rel="shortcut icon" href="{{{ asset('images/loco-ico.ico') }}}">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
		<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0; z-index:100;">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/tablero"><span class="icon-logo_red"></span></a> 
			</div>
	<div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
		-Café Red- &nbsp; 
		<a href="auth/logout" class="btn btn-danger square-btn-adjust">Salir</a> 
	</div>
		</nav>
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li style="text-align: center;">
						<a class="active-menu"  href="/"><i class=""></i>RED KAT</a>
					</li>
					<li>
						<a href="#"><i class="icon-ong"></i> ONG</a>
						<ul class="nav nav-second-level">
							<li>
								<a href="/donantes">Donantes</a>
							</li>
							<li>
								<a href="/donaciones">Donaciones</a>
							</li>
							<li>
								<a href="/actividades">Actividades</a>
							</li>
							<li>
								<a href="/users">Usuarios</a>
							</li>
						</ul>
					</li>
								 
					<li>
						<a href="#"><i class="icon-escuela"></i> Escuela</a>
						<ul class="nav nav-second-level">
							<li>
								<a href="/estudiantes">Estudiante</a>
							</li>
							<li>
								<a href="/cursos">Curso</a>
							</li>
							<li>
								<a href="/maestros">Maestro</a>
							</li>
							<li>
								<a href="/horarios">Horarios</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-restaurante"></i>Restaurante</a>
						<ul class="nav nav-second-level">
							<li>
								<a href="/materiaprima">Materia prima</a>
							</li>
							<li>
								<a href="/platillo">Platillo</a>
							</li>
							<li>
								<a href="/temporada">Temporadas</a>
							</li>
							<li>
								<a href="/clientes">Clientes</a>
							</li>
							<li>
								<a href="/compra">Compras</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-despensa"></i>Despensa</a>
						<ul class="nav nav-second-level">
							<li>
								<a href="/proveedores">Proveedores</a>
							</li>
						    <li>
								<a href="/venta">Ventas</a>
							</li>
							 <li>
								<a href="/producto">Productos</a>
							</li>
							<li>
								<a href="/consignaciones">Consignaciones</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /. NAV SIDE  -->
		<div id="page-wrapper" >
			<div id="page-inner">
					@yield('content')
					<div class="principal-final">.</div>
				    <!-- jQuery -->
					<script src="//code.jquery.com/jquery.js"></script>
					<!-- DataTables -->
					<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
					<!-- Bootstrap JavaScript -->
					<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js">						</script>
					<!-- App scripts -->
					@stack('scripts')
			</div>
		</div>

	</div>
   
    </body>
</html>