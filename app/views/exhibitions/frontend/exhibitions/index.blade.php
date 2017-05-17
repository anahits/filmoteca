@extends('exhibitions.layouts.frontend')

@section('metas')

@stop

@section('breadcrumbs')
    <li class="active">@lang('exhibitions.frontend.exhibition.index.breadcrumbs_title')</li>
@stop

@section('title')
    @lang(
        'exhibitions.frontend.exhibition.index.title',
        [
            'textual_day' => @trans('dates.days.' . $date->format('l')),
            'numeric_day' => $date->format('j'),
            'textual_month' => @trans('dates.months.' . $date->format('F'))
        ]
    )
@stop

@section('content')

    <span class="result-number">
        @lang('exhibitions.frontend.exhibition.index.results_number', ['number' => $exhibitions->getTotal()])
    </span>

    <h1>
        @lang(
        'exhibitions.frontend.exhibition.index.title',
        [
            'textual_day' => @trans('dates.days.' . $date->format('l')),
            'numeric_day' => $date->format('j'),
            'textual_month' => @trans('dates.months.' . $date->format('F'))
        ]
    )
    </h1>

    @if ($exhibitions->isEmpty())
        @lang('exhibitions.frontend.film.index.none_film_found', ['film_title' => \Input::get('title')])
    @endif

    <div class="exhibitions index">
        @foreach ($exhibitions as $exhibition)
            @include('exhibitions.frontend.exhibitions.partials.details', ['exhibition' => $exhibition])
        @endforeach

        <div class="text-center">
            {{ $exhibitions->links() }}
        </div>
    </div>
@stop
