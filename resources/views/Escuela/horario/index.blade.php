@extends('layouts.principal')
@section('content')

<div class="container col-xs-12">
<h3 class="title" selected="selected">Horarios</h3>
	<hr> 
	<div class=" table-responsive">
		<table class="table table-condensed">
  			<thead>
	  			<th>Lunes</th>
	  			<th>Martes</th>
				<th>Miercoles</th>
				<th>Jueves</th>
				<th>Viernes</th>
				<th>Sabado</th>
				<th>Domingo</th>
			</thead>
			
			<tbody>
				<td>
					@foreach($horarios as $horario)
					<a href="/cursos/{{$horario->curso_id}}">
						<div class ="lunes" style="margin: 10px 0 0px 0;">
								@if($horario->dia == 'Lunes')
								<div class="nombre_horario">
								{{$horario->curso->nombre_curso}}
								</div>
								<div class = "info_horario">
									<strong>Hora:</strong><br>
									{{$horario->hora_inicio}} - {{$horario->hora_fin}}
									<br>
									<strong>Salón:</strong><br>
									{{$horario->salon}} 
								</div>
							@endif
						</div>
					</a>
					@endforeach
				</td>
				<td>
					@foreach($horarios as $horario)
					<a href="/cursos/{{$horario->curso_id}}">
						<div class ="martes" style="margin: 10px 0 0px 0;">
							@if($horario->dia == 'Martes')
								<div class="nombre_horario">
								{{$horario->curso->nombre_curso}}
								</div>
								<div class = "info_horario">
									<strong>Hora:</strong><br>
									{{$horario->hora_inicio}} - {{$horario->hora_fin}}
									<br>
									<strong>Salón:</strong><br>
									{{$horario->salon}} 
								</div>
							@endif
						</div>
					</a>
					@endforeach
				</td>
				<td>
					@foreach($horarios as $horario)
					<a href="/cursos/{{$horario->curso_id}}">
						<div class ="miercoles" style="margin: 10px 0 0px 0;">
							@if($horario->dia == 'Miércoles')
								<div class="nombre_horario">
								{{$horario->curso->nombre_curso}}
								</div>
								<div class = "info_horario">
									<strong>Hora:</strong><br>
									{{$horario->hora_inicio}} - {{$horario->hora_fin}}
									<br>
									<strong>Salón:</strong><br>
									{{$horario->salon}} 
								</div>
							@endif
						</div>
					</a>
					@endforeach
				</td>
				<td>
					@foreach($horarios as $horario)
					<a href="/cursos/{{$horario->curso_id}}">
						<div class ="jueves" style="margin: 10px 0 0px 0;">
							@if($horario->dia == 'Jueves')
								<div class="nombre_horario">
								{{$horario->curso->nombre_curso}}
								</div>
								<div class = "info_horario">
									<strong>Hora:</strong><br>
									{{$horario->hora_inicio}} - {{$horario->hora_fin}}
									<br>
									<strong>Salón:</strong><br>
									{{$horario->salon}} 
								</div>
							@endif
						</div>
					</a>
					@endforeach
				</td>
				<td>
					@foreach($horarios as $horario)
					<a href="/cursos/{{$horario->curso_id}}">
						<div class ="viernes" style="margin: 10px 0 0px 0;">
							@if($horario->dia == 'Viernes')
								<div class="nombre_horario">
								{{$horario->curso->nombre_curso}}
								</div>
								<div class = "info_horario">
									<strong>Hora:</strong><br>
									{{$horario->hora_inicio}} - {{$horario->hora_fin}}
									<br>
									<strong>Salón:</strong><br>
									{{$horario->salon}} 
								</div>
							@endif
						</div>
					</a>
					@endforeach
				</td>
				<td>
					@foreach($horarios as $horario)
					<a href="/cursos/{{$horario->curso_id}}">
						<div class ="sabado" style="margin: 10px 0 0px 0;">
							@if($horario->dia == 'Sábado')
								<div class="nombre_horario">
								{{$horario->curso->nombre_curso}}
								</div>
								<div class = "info_horario">
									<strong>Hora:</strong><br>
									{{$horario->hora_inicio}} - {{$horario->hora_fin}}
									<br>
									<strong>Salón:</strong><br>
									{{$horario->salon}} 
								</div>
							@endif
						</div>
					</a>
					@endforeach
				</td>
				<td>
					@foreach($horarios as $horario)
					<a href="/cursos/{{$horario->curso_id}}">
						<div class ="domingo" style="margin: 10px 0 0px 0;">
							@if($horario->dia == 'Domingo')
								<div class="nombre_horario">
								{{$horario->curso->nombre_curso}}
								</div>
								<div class = "info_horario">
									<strong>Hora:</strong><br>
									{{$horario->hora_inicio}} - {{$horario->hora_fin}}
									<br>
									<strong>Salón:</strong><br>
									{{$horario->salon}} 
								</div>
							@endif
						</div>
					</a>
					@endforeach
				</td>
				</tbody>
		</table>
	</div>
</div>
@stop