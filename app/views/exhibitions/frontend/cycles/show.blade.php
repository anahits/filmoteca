@extends('exhibitions.layouts.frontend')

@section('metas')

@stop

@section('breadcrumbs')
    <li>
        {{ html::linkRoute(
            'exhibitions.frontend.exhibitions.index',
            Lang::trans('exhibitions.frontend.exhibition.index.breadcrumbs_title')) }}
    </li>
    <li>
        {{ html::linkRoute(
            'exhibitions.frontend.cycle.index',
            Lang::trans('exhibitions.frontend.cycle.index.title')) }}
    </li>
    <li class="active">{{ $cycle->getName() }}</li>
@stop

@section('title')
    @lang('exhibitions.frontend.cycle.index.title')
@stop

@section('content')

    <h1>
        @lang('exhibitions.frontend.cycle.show.title'):
    </h1>

    <div class="exhibitions index">

        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3>
                    @if ($cycle->getName()!== null)
                        {{ $cycle->getName() }}
                    @endif
                </h3>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="image">
                            <a href="{{ URL::route('exhibitions.frontend.cycle.show', ['slug' => $cycle->getSlug()]) }}">
                                <img src="{{ $cycle->getImage()->getMediumImageUrl()}}"
                                     title="{{ $cycle->getName() }}"
                                     class="img-responsive"
                                     alt="{{ $cycle->getName() }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="description cycle-scroll-over">
                            {{ $cycle->getDescription() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="small-cycle-heading">
            @foreach ($exhibitions as $exhibition)
                @include('exhibitions.frontend.exhibitions.partials.details')
            @endforeach

            <div class="text-center">
                {{ $exhibitions->links() }}
            </div>
        </div>
    </div>
@stop
