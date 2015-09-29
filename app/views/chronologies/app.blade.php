@extends('layouts.default')

@section('scripts')

	{{ HTML::script('/apps/require.config.js')}}

	{{ HTML::script(
		'/bower_components/requirejs/require.js', 
		['data-main' =>'/apps/pages/chronology/App.js'])
	}}
	
	{{ HTML::scripts(array(
  '/bower_components/jquery/dist/jquery.min.js',
  '/bower_components/bootstrap/dist/js/bootstrap.min.js',
  '/bower_components/slick.js/slick/slick.min.js')) }}


	{{-- 
		Este modulo local regresara una lista de ganadores de la medalla filmoteca.
		Definiendolo así ganamos dos cosas. La primera, se evita hacer otra 
		soliciturd al servidor para recuperar la lista de ganadores. Y la otra,
		hace que nuestra lista de ganadores sea una variable local en vez de una
		global.
	--}}
	<script>
		define('filmoteca.winners', [], {{ $winners->toJson() }} )
	</script>
@stop

@section('styles')

	{{ HTML::styles(array(
		'/bower_components/jqueryui/themes/ui-lightness/jquery-ui.min.css',
		'/bower_components/jquery-ui-slider-pips/dist/jquery-ui-slider-pips.css')) }}
@stop

@section('breadcrumbs')
	<li>
		<a href="/pages/quienes-somos/mision-y-vision">
			Quiénes somos
		</a>
	</li>
	<li class="active">
		Cronología
	</li>
@stop

@section('sidebar')
	@include('elements.menus.quienes-somos', array('selected' => 4))
@stop

{{----------------------------------------------------------------------------}}
{{-- Main Content															--}}
{{----------------------------------------------------------------------------}}

@section('content')
	<p>Selecciona el rango de los años que deseas consultar</p><br>
	<div class="filmoteca-medal-slider">
		<div data-slider-pips
			config="sliderConfig"
			ng-model="range">
		</div>
	</div>

	<div class="loading" ng-show="loading"></div>

	<h1>Cronología</h1>
	<div class="filmoteca-medal-list ng-cloak">
		<div class="wrapper-items" id="wrapper-items">

			<ul class="items" id="items">

				@foreach( $winners as $index => $winner )

				<li class=""
					ng-show="winners[{{ $index }}].visible">

					<span class="year">{{$winner->year}}</span>
					<span class="description">
						{{$winner->description}}
					</span>
				</li>

				@endforeach
			</ul>
		</div>
	</div>
@stop