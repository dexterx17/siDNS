@extends('front.template.main')

@section('title','Crear dominio')

@section('content')

{!! Form::open(['route'=>'admin.dominios.store','method'=>'POST']) !!}
	<div class="form-group">
		{!! Form::label('url','Url') !!}
		{!! Form::text('url',null,['class'=>'form-control','required','placeholder'=>'Url a gestinoar']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('sentido','Sentido') !!}
		{!! Form::text('sentido',null,['class'=>'form-control','required','placeholder'=>'IN']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tipo','tipo') !!}
		{!! Form::text('tipo',null,['class'=>'form-control','required','placeholder'=>'A|CNAME']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('destino','Destino') !!}
		{!! Form::text('destino',"192.168.1.50",['class'=>'form-control','required','placeholder'=>'redirigir hacia']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('bloqueado','Bloqueado') !!}
		{!! Form::checkbox('bloqueado',null,true) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Crear',['class'=>'btn btn-primary form-control']) !!}
	</div>

{!! Form::close()!!}
@endsection
