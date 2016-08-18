<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Default') | Blog</title>
	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.css')}}">
</head>
<body>
<div class="container">
	
	@include('front.template.partials.nav')

	<div class="row">
		<div class="col-lg-8">
			@yield('content')
		</div>
		<div class="col-lg-4">
			@yield('side')
		</div>
	</div>
	<script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
	@yield('js')
</div>
</body>
</html>
