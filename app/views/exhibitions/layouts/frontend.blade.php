@extends('layouts.default')

@section('sidebar')


    {{ Form::open(['route' => 'exhibitions.frontend.exhibitions.index', 'method' => 'GET']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-search"></span>
            </div>
            <label class="hidden" for="name">
                @lang('exhibitions.frontend.exhibition.index.search')
            </label>
            <input type="text"
                   class="form-control"
                   id="films-searcher"
                   name="title"
                   placeholder="@lang('exhibitions.frontend.exhibition.index.search')">
            <div class="input-group-addon">&gt;</div>
        </div>
    {{ Form::close() }}

    <div class="flm-section programming">
        <div class="margin-top link-group">
            @include('exhibitions.frontend.exhibitions.partials.programming')
        </div>
    </div>
    @include('exhibitions.frontend.exhibitions.partials.billboard-subscription-form')

    <br><br>

    <div class="hidde-when-small">
        <div class="fb-page" 
            data-href="https://www.facebook.com/Comunidad.Cines.UNAM/?fref=ts" 
            data-tabs="timeline" 
            data-small-header="true" 
            data-adapt-container-width="true" 
            data-hide-cover="false" 
            data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/Comunidad.Cines.UNAM/?fref=ts">
                    <a href="https://www.facebook.com/Comunidad.Cines.UNAM/?fref=ts">
                        @lang('exhibitions.frontend.exhibition.show.unam_cinemas_community')
                    </a>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="hidde-when-normal">
        <div class="fb-page" 
            data-href="https://www.facebook.com/Comunidad.Cines.UNAM/" data-tabs="timeline" 
            data-height="190" 
            data-small-header="true" 
            data-adapt-container-width="true" 
            data-hide-cover="false" 
            data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/Comunidad.Cines.UNAM/">
                    <a href="https://www.facebook.com/Comunidad.Cines.UNAM/">
                        Comunidad  Cines UNAM
                    </a>
                </blockquote>
            </div>
        </div>
    </div>
@stop
