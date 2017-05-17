@extends('exhibitions.layouts.frontend')

@section('breadcrumbs')
    <li>
        {{ html::linkRoute(
            'exhibitions.frontend.exhibitions.index',
            Lang::trans('exhibitions.frontend.exhibition.index.breadcrumbs_title')) }}
    </li>
    <li class="active">@lang('exhibitions.frontend.invitations.index.title')</li>
@stop


@section('content')

    {{ $page->body }}

@stop

