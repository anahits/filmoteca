<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		@yield('metas')

		@if (App::isLocal() )

		{{ HTML::style('/assets/css/filmoteca.css') }}

		{{-- 
			This styles are loaded with angular.js however we need them
			before requirejs load the scripts. 
		--}}
		{{ HTML::style('/bower_components/angular/angular-csp.css')}}

		@else
			{{--
				La idea de esta sección es cargar, cuando se está en producción,
				un unico archivo css. Sin embargo hay dudas si se deben
				concatenar únicamente los archivos propios sin los css de terceros
				o concatenar todo.
				--}}
				{{ HTML::style('/assets/css/filmoteca.min') }}
		@endif

		@yield('styles')

		@yield('scripts')

		<title>Filmoteca UNAM</title>
	</head>

	<body>

	<body>
		@include('layouts.header')

		<div class="container-fluid">
			<div class="row">
				
				<div class="sidebar col-sm-4">
					@yield('sidebar')
				</div>

				<div class="content col-sm-8">
					@yield('content')
				</div>
				
			</div>
		</div>

		@include('layouts.footer')
	</body>
</html>
