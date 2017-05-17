@extends('exhibitions.layouts.frontend')

@section('breadcrumbs')
    <li>
        {{ html::linkRoute(
            'exhibitions.frontend.exhibitions.index',
            Lang::trans('exhibitions.frontend.exhibition.index.breadcrumbs_title')) }}
    </li>
    <li>
        {{ html::linkRoute('exhibition.history', Lang::trans('exhibitions.frontend.history.title')) }}
    </li>
    <li class="active">{{ $exhibition->getFilm()->getTitle() }}</li>
@stop

@section('content')
	<div class="exhibitions index">
		@include('exhibitions.frontend.exhibitions.partials.details')
	</div>
@stop
