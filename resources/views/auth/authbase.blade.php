<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>::CAFE RED::</title>
	{!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')!!}
	{!!Html::style('css/style.css')!!}
	<link rel="shortcut icon" href="{{{ asset('images/loco-ico.ico') }}}">

</head>
<body id="login">
	<p align="center">
		<span class="icon-logo_red"></span>
	</p>
	<div id="loginBody">
		@yield('content')
	</div>
	<div id="loginBarra">
	</div>
	<div id="loginFooter">
		Copyright &copy; - URL Proyectos - 2015
	</div>

	{!!Html::script('https://code.jquery.com/jquery-1.11.3.min.js')!!}
	{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')!!}
</body>
</html>
