<!DOCTYPE html>

<!-- Stored in resources/views/layouts/master.blade.php -->

<<<<<<< HEAD
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
=======
<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show
>>>>>>> bf1386e98fc3bfb0d0d3c5da7a9ed8b766ab625b

	
	{!!Html::script('//code.jquery.com/jquery-1.11.3.min.js')!!}
	{!!Html::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')!!}
</body>
</html>