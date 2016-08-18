@extends('front.template.main')

@section('title','Lista de dominios registrados')

@section('content')
<a href="{{ route('admin.dominios.create') }}" class="btn btn-primary">Nuevo Dominio</a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>URL</th>
			<th>SENTIDO</th>
			<th>TIPO</th>
			<th>DESTINO</th>
			<th>BLOQUEADA</th>
		</tr>
	</thead>
	<tbody>
		@foreach($dominios as $dominio)
			<tr>
				<td>{{$dominio->id}}</td>
				<td>{{$dominio->url}}</td>
				<td>{{$dominio->sentido}}</td>
				<td>{{$dominio->tipo}}</td>
				<td>{{$dominio->destino}}</td>
				<td>{{$dominio->bloqueado}}</td>
				<td>
					<a href="{{route('admin.dominios.edit',$dominio->id)}}" class="glyphicon glyphicon-edit btn btn-danger"></a>
					<a href="{{route('admin.dominios.destroy',$dominio->id)}}" class="glyphicon glyphicon-remove-circle btn btn-warning" onclick="return confirm('Seguro que deseas eliminarlo')"></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $dominios->render() !!}

@endsection
