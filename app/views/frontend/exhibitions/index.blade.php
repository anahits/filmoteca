@extends('layouts.default')

@section('metas')

@stop

@section('title')
    @lang(
        'exhibitions.frontend.index.title',
        [
            'textual_day' => @trans('dates.days.' . $date->format('l')),
            'numeric_day' => $date->format('j'),
            'textual_month' => @trans('dates.months.' . $date->format('F'))
        ]
    )
@stop

@section('sidebar')
    @include('frontend.exhibitions.partials.calendar', ['dates' => $calendar, 'date' => $date])
@stop

@section('content')
    <h1>
        @lang(
        'exhibitions.frontend.index.title',
        [
            'textual_day' => @trans('dates.days.' . $date->format('l')),
            'numeric_day' => $date->format('j'),
            'textual_month' => @trans('dates.months.' . $date->format('F'))
        ]
    )
    </h1>

    <div class="exhibitions index">
    @foreach ($exhibitions as $exhibition)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="icon">
                    @if ($exhibition->getType() !== null)
                        <span>
                            <img src="{{ $exhibition->getType()->getImage()->getSmallImageUrl() }}">
                        </span>
                        <span>{{ $exhibition->getType()->getName() }}</span>
                    @endif
                </div>
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="fb-like"
                             data-href="{{ URL::action('ExhibitionController@detail', array('id' => $exhibition->id ))}}"
                             data-layout="button"
                             data-action="like"
                             data-show-faces="true"
                             data-share="true">
                        </div>
                        
                        <img src="{{ $exhibition->getFilm()->getCover()->getMediumImageUrl() }}">
                    </div>
                    <div class="col-md-8">
                        <h2 class="text-center">{{ $exhibition->getFilm()->getTitle() }}</h2>

                        <!-- Texto que mostrará duración, fecha y año -->
                        <h6 class="text-center">
                            <span class="countries">{{ $exhibition->getFilm()->getCountries()->implode('name', ', ') }}</span>
                            <span> / </span>
                            <span class="years">{{ implode(',', $exhibition->getFilm()->getYears()) }}</span>
                            <span> / </span>
                            <span class="duration">{{ $exhibition->getFilm()->getDuration() }} min.</span>
                        </h6>

                        <!-- Pestañas de sinopsis, fiche técnica, trailer y notas-->
                        <div class="content">
                            <!-- Nav tabs -->
                            <div role="tabpanel">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active" role="presentation">
                                        <a data-toggle="tab" role="tab" href="#tab-1">Sinopsis</a>
                                    </li>
                                    <li class="" role="presentation">
                                        <a data-toggle="tab" role="tab" href="#tab-2">Ficha Técnica</a>
                                    </li>
                                    <li class="" role="presentation">
                                        <a data-toggle="tab" role="tab" href="#tab-3">Trailer</a>
                                    </li>
                                    <li class="" role="presentation">
                                        <a data-toggle="tab" role="tab" href="#tab-4">Notas</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active" role="tabpanel">
                                        <li class="list-group-item">
                                            <p>{{ $exhibition->getFilm()->getSynopsis() }}</p>
                                        </li>
                                    </div>

                                    <!-- Ficha técnica que se muestra en la pestaña Ficha técnica(tab-2) -->
                                    <div class="tab-pane" role="tabpanel" id="tab-2">
                                        <li class="list-group-item embed-responsive embed-responsive-16by9">
                                            <p>{{ $exhibition->getFilm()->getTrailer() }}</p>
                                        </li>
                                    </div>

                                    <!-- Video que se muestra en la pestaña Trailer(tab-3) /4by3-->
                                    <div class="tab-pane" role="tabpanel" id="tab-3">
                                        <li class="list-group-item embed-responsive embed-responsive-16by9">
                                            <p>{{ $exhibition->getFilm()->getTrailer() }}</p>
                                        </li>
                                    </div>

                                    <!-- Notas que se muestran en la pestaña Notas(tab-4) -->
                                    <div class="tab-pane" role="tabpanel" id="tab-4">
                                        <li class="list-group-item embed-responsive embed-responsive-16by9">
                                            <p>{{ $exhibition->getFilm()->getNotes() }}</p>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading-hora">
                        <h3>@lang('exhibitions.show.is_presented_at')</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($exhibition->getSchedules()->groupByAuditorium() as $scheduleGroup)
                            <div class="row">
                                <div class="col-md-5">
                                        <span class="auditorium-name">
                                            {{ $scheduleGroup->getAuditorium()->getName() }}
                                        </span>

                                            <a href="#">@lang('exhibitions.show.see_location')
                                            </a>
                                </div>
                                <div class="col-md-7">
                                    {{ HTML::schedulesTimeAsList($scheduleGroup->getSchedules()) }}
                                </div>
                            </div>
                        @endforeach

                        <!-- Botón que desplegará más horarios -->
                        <div align="right">
                            <button type="button"
                                    class="btn btn-default more-schedules"
                                    data-href="{{ URL::route('exhibition.schedule.search',['exhibtionId' => $exhibition->getId()]) }}"
                                    data-since="{{ $exhibition->getSchedules()->first()->getEntry()->format(MYSQL_DATE_FORMAT)  }}"
                                    title="@lang('exhibition.see_more_schedules')">
                                @lang('exhibitions.show.see_more_schedules')
                            </button>
                            <div align="left" class="collapse">
                                {{-- This content is loaded with AJAX and it is located in --}}
                                {{-- views/frontend/exhibitions/partials/more-schedules    --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    </div>
@stop

