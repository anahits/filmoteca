<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		@yield('metas')

		{{
			HTML::scripts([
				'/bower_components/jquery/dist/jquery.min.js',
				'/bower_components/bootstrap/dist/js/bootstrap.min.js',
				'/bower_components/slick.js/slick/slick.min.js'
				])
		}}

		{{ HTML::style('/assets/css/filmoteca.css') }}

		@yield('styles')

		@yield('scripts')

		<title>Filmoteca UNAM</title>
	</head>

	<body>
		@include('layouts.header')

		<div class="container-fluid">
			<div class="row">
				<div class="sidebar col-sm-3">
					@yield('sidebar')
				</div>
				<div class="content col-sm-9">
					@yield('content')
				</div>
			</div>
		</div>

		@include('layouts.footer')
	</body>
</html>
