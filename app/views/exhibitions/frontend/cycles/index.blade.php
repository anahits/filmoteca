@extends('exhibitions.layouts.frontend')

@section('metas')

@stop

@section('breadcrumbs')
    <li>
        {{ html::linkRoute(
            'exhibitions.frontend.exhibitions.index',
            Lang::trans('exhibitions.frontend.exhibition.index.breadcrumbs_title')) }}
    </li>
    <li class="active">@lang('exhibitions.frontend.cycle.index.title')</li>
@stop

@section('title')
    @lang('exhibitions.frontend.cycle.index.title')
@stop

@section('content')

    <h1>
        @lang('exhibitions.frontend.cycle.index.title')
    </h1>

    <div class="exhibitions index">
        @foreach ($cycles as $cycle)
            @include('exhibitions.frontend.cycles.partials.details', ['cycle' => $cycle])
        @endforeach

        <div class="text-center">
            {{ $cycles->links() }}
        </div>
    </div>
@stop
