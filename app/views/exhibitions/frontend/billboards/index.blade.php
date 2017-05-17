@extends('exhibitions.layouts.frontend')

@section('breadcrumbs')
    <li>
        {{ html::linkRoute(
            'exhibitions.frontend.exhibitions.index',
            Lang::trans('exhibitions.frontend.exhibition.index.breadcrumbs_title')) }}
    </li>
    <li class="active">@lang('exhibitions.frontend.billboard.index.title')</li>
@stop

@section('content')

    <h1 class="text-uppercase">
        @lang('exhibitions.frontend.billboard.index.title')
    </h1>

    <div class="row">
        <div class="col-xs-12 col-sm-12 text-center">
            @if (isset($lastBillboard))
                <h2 class="text-uppercase">
                    @lang(
                        'exhibitions.frontend.billboard.index.billboard_of',
                        ['month' => trans('dates.months.' . date('F', strtotime($lastBillboard->created_at)))]
                    )
                </h2>
                @include('exhibitions.frontend.billboards.partials.one-billboard', ['billboard' => $lastBillboard])
            @endif
        </div>
    </div>


    @foreach($earlierBillboards as $year => $billboards)
        @if (!$billboards->isEmpty())
            <div class="row">
                <h4>
                    @lang('exhibitions.frontend.billboard.index.earlier_billboard', ['year' => $year])
                </h4>
                @foreach($billboards as $billboard)
                    <div class="col-xs-3 col-sm-3">
                        <h5 class="text-uppercase">
                            @lang('dates.months.' . date('F', strtotime($billboard->created_at)))
                        </h5>
                        @include('exhibitions.frontend.billboards.partials.one-billboard', ['billboard' => $billboard])
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach

@stop
