@extends('exhibitions.layouts.frontend')

@section('breadcrumbs')
	<li>
	    {{ html::linkRoute(
	    	'exhibitions.frontend.exhibitions.index',
	    	Lang::trans('exhibitions.frontend.exhibition.index.breadcrumbs_title')) }}
	</li>
	<li class="active">@lang('exhibitions.frontend.history.title')</li>
@stop

@section('title')
	@lang('exhibitions.frontend.history.title')
@stop

@section('content')

<div class="content">
	<h2>@lang('exhibitions.frontend.history.title')</h2>

	<div class="well">
		{{ Form::open(['route' => 'exhibition.history', 'method' => 'GET', 'class' => 'form-horizontal']) }}

		{{ Form::formGroup('text', 'title', Lang::trans('exhibitions.frontend.film.show.fields.title'), 'exhibition_finder')}}

		{{ Form::formGroup('text', 'director', Lang::trans('exhibitions.frontend.film.show.fields.director'), 'exhibition_finder') }}

		{{ Form::submit(Lang::trans('exhibitions.frontend.history.search'), ['class' => 'btn btn-success pull-right']) }}

		<div class="clearfix"></div>

		{{ Form::close()}}
	</div>

	@if (isset($results))

		@if ($results->isEmpty())
			<div class="alert alert-warning">
				@lang('exhibitions.frontend.history.none_results')
			</div>
		@else
			<div class="alert alert-success">
				@lang('exhibitions.frontend.history.results', ['number' => $results->count()])
			</div>

			@include('exhibitions.frontend.exhibitions.partials.tabulator', ['editable' => false])
		@endif
	@endif
</div>

@stop
