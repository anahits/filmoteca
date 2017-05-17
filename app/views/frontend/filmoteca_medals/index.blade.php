@extends('layouts.default')

@section('styles')

	{{ HTML::styles([
			'/bower_components/jquery-ui-slider-pips/dist/jquery-ui-slider-pips.css'
		])
	}}
@stop

@section('breadcrumbs')
	<li>
		<a href="/pages/quienes-somos/medalla-filmoteca">Quiénes somos</a>
	</li>
	<li>
		<a href="/pages/quienes-somos/medalla-filmoteca">Medalla Filmoteca</a>
	</li>
	<li class="active">
		Galardonados
	</li>
@stop

@section('sidebar')
	@include('elements.menus.quienes-somos', array('selected' => 5))
@stop

@section('title')
	@lang('filmoteca.frontend.filmoteca_medals.title')
@stop

@section('content')

<h1>@lang('filmoteca.frontend.filmoteca_medals.title')</h1>

@include('elements.bootstrap-modal')

<div class="winner-searcher-wrapper pull-right">
	<span class="glyphicon glyphicon-search pull-left"></span>
	<input id="winner-searcher">
</div>

<div class="year-selector-wrapper">
	<p>@lang('filmoteca.frontend.filmoteca_medals.see_winner_by_year'):</p>
	<div id="year-selector"></div>
</div>

<div class="wrapper-items" id="wrapper-items">
	<div id="results" class="results">
		<span>@lang('filmoteca.general.results'): </span><span class="number"></span>
	</div>
	<ul class="items" id="winners">
		@foreach( $winners as $index => $winner )
		<li class="thumbnail item" data-award-year="{{ $winner->award_date->year }}">
			<img src="{{ $winner->image->url('thumbnail') }}" alt="{{ $winner->name }}">
			{{
				HTML::link(
				'filmoteca-medal/' . $winner->id . '/detail',
				str_limit($winner->name, 20),
				[
					'title' => trans('filmoteca.general.see_details'),
					'data-id' => $winner->id
				]
				)
			}}
		</li>
		@endforeach
	</ul>
</div>
@stop
