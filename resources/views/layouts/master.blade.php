<!-- Stored in resources/views/layouts/master.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>::Cafeteria::</title>
	{!!Html::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')!!}
</head>
<body>
	<header><h1>Cafeteria</h1></header>
	@yield('content')

	
	{!!Html::script('//code.jquery.com/jquery-1.11.3.min.js')!!}
	{!!Html::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')!!}
</body>
</html>