@extends('layouts.default')

@section('title')
    {{ $page->getTitle() }}
@endsection

@section('breadcrumbs')
    {{ HTML::breadcrumbs($page) }}
@endsection

@section('sidebar')
    <div class="static-pages-menu">
        {{ HTML::siblingsPages($page) }}
    </div>
@endsection

@section('content')
        {{ $page->getContent() }}
@endsection
