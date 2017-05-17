<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="robots" content="follow, index">

        <link href="/assets/imgs/favicon.ico" rel="icon" type="image/x-icon" />

		@yield('metas')
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		{{ HTML::style('/assets/css/filmoteca.css') }}

		@yield('styles')
		<title>@yield('title')</title>
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

        @include('elements.google-tag-manager')

		<script>
			var Config = {{ json_encode($exhibitionsConfig, JSON_UNESCAPED_SLASHES) }};
			@if (isset($filmotecaConfig))
				var filmotecaConfig = {{ $filmotecaConfig->toJson(); }};
			@endif
		</script>

        @yield('default-scripts', HTML::scripts([
            '/bower_components/jquery/dist/jquery.min.js',
            '/bower_components/bootstrap/dist/js/bootstrap.min.js',
            '/bower_components/slick.js/slick/slick.min.js',
            '/bower_components/jqueryui/ui/minified/core.min.js',
            '/bower_components/jqueryui/ui/minified/widget.min.js',
            '/bower_components/jqueryui/ui/minified/position.min.js',
            '/bower_components/jqueryui/ui/minified/menu.min.js',
            '/bower_components/jqueryui/ui/minified/autocomplete.min.js',
            '/bower_components/jqueryui/ui/minified/accordion.min.js',
            '/bower_components/jqueryui/ui/minified/mouse.min.js',
            '/bower_components/jqueryui/ui/minified/slider.min.js',
            '/bower_components/jquery-ui-slider-pips/dist/jquery-ui-slider-pips.min.js',
            '/assets/js/filmoteca.min.js'
            ]))

        @yield('scripts')

    </body>
</html>
