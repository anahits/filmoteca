@extends('exhibitions.layouts.frontend')

@section('metas')

    <meta property="og:url"           content="{{ Request::url() }}" />
    <meta property="og:type"          content="video.movie" />
    <meta property="og:title"         content="{{ Config::get('parameters.institution.name') }}" />
    <meta property="og:description"   content="{{ strip_tags(Str::limit($film->getSynopsis())) }}" />
    <meta property="og:image"         content="{{{ 'http:' . $domain . str_replace(' ', '%20', $film->getCover()->getOriginalImageUrl()) }}}" />
@stop

@section('breadcrumbs')
    <li>
        {{ html::linkRoute(
            'exhibitions.frontend.exhibitions.index',
            Lang::trans('exhibitions.frontend.exhibition.index.breadcrumbs_title')) }}
    </li>
    <li>@lang('exhibitions.frontend.film.index.title')</li>
    <li class="active">{{ $film->getTitle() }}</li>
@stop

@section('title')
    @lang('exhibitions.frontend.film.index.title') - {{ $film->getTitle() }}
@stop

@section('content')
    <div class="exhibitions index">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{{ $film->getTitle() }}</h1>
            </div>


            <div class="panel-body for-show">
                @include('exhibitions.frontend.films.partials.details', ['film' => $film]
                )
            </div>
        </div>
    </div>
@stop
