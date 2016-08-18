@extends('front.template.main')

@section('title','Inicio')

@section('content')

	<h3 class="title-front">URLS</h3>
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Ultimos registros			
		</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>fecha</th>
						<th>hora</th>
						<th>origen</th>
						<th>url</th>
						<th>tipo</th>
						<th>destino</th>
					</tr>
				</thead>
				<tobdy>
					@foreach($registros as $registro)
					<tr>
						<td>{{$registro->id}}</td>
						<td>{{$registro->fecha}}</td>
						<td>{{$registro->hora}}</td>
						<td>{{$registro->origen}}</td>
						<td>{{$registro->url}}</td>
						<td>{{$registro->tipo}}</td>
						<td>{{$registro->destino}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
		{!! $registros->render() !!}
		</div>
	</div>	
</div>
@endsection


@section('side')


@endsection
