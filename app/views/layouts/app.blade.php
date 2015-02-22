<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		@yield('metas')

		{{ HTML::style('/assets/css/filmoteca.css') }}

		{{-- 
			This styles are loaded with angular.js however we need them
			before requirejs load the scripts. 
		--}}
		{{ HTML::style('/bower_components/angular/angular-csp.css')}}

		@yield('styles')

		@yield('scripts')

		<title>Filmoteca UNAM</title>
	</head>

	<body>

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
