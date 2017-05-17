<div class="row film">
    <!-- Imagen de película y me gusta -->
    <div class="col-xs-4 col-sm-6 col-md-5 col-lg-3">
        <img src="{{ $film->getCover()->getMediumImageUrl() }}">
        @include(
            'elements.facebook.like-button', [
                'url' => URL::route('exhibitions.frontend.film.show', ['slug' => $film->getSlug()])
            ]
        )
    </div>
    <!-- Panel pestañas -->
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-9">
        <a class="underline hidden-title" href="{{ URL::route('exhibitions.frontend.film.show', ['slug' => $film->getSlug()]) }}">
            <h2 class="text-center">
                {{ $film->getTitle() }}
            </h2>
        </a>

        <!-- Texto que mostrará duración, fecha y año -->
        <h6 class="text-center">
            <p class="margin">
                <strong>
                    {{ HTML::summaryTechnicalCard($film) }}
                </strong>
            </p>
        </h6>

        <!-- Pestañas de horarios, sinopsis, fiche técnica, trailer y notas -->
        <div class="content size-tab-show">
            <!-- Nav tabs -->
            <div role="tabpanel">
                <ul class="nav nav-tabs film-tabs" role="tablist">

                <!-- Pestaña Horarios -->
                    <li class="active border" role="presentation">                          
                        <a data-toggle="tab" role="tab" href="{{ '#tab-schedules-' . $film->getId() }}">
                          <div class="row tab-icon">
                                <div class="col-md-5">
                                    <div class="link">
                                        <img  src="/imgs/programacion/iconos/schedules.png"
                                         title="@lang('exhibitions.frontend.exhibition.show.schedules')"
                                         alt="@lang('exhibitions.frontend.exhibition.show.schedules')"> 
                                    </div> 
                                </div>
                                <div class="col-md-7">
                                    <p>
                                        @lang('exhibitions.frontend.exhibition.show.schedules')
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                     <!-- Pestaña Sinopsis -->
                    <li class="border" role="presentation">
                        <a data-toggle="tab" role="tab" href="{{ '#tab-synopsis-' . $film->getId() }}">
                            <div class="row tab-icon">
                                <div class="col-md-5">
                                    <div class="link">
                                        <img src="/imgs/programacion/iconos/synopsis.png"
                                         title="@lang('exhibitions.frontend.film.show.fields.synopsis')"
                                         alt="@lang('exhibitions.frontend.film.show.fields.synopsis')"> 
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <p>
                                        @lang('exhibitions.frontend.film.show.fields.synopsis')
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- Pestaña Ficha técnica -->
                    <li class="border" role="presentation">
                        <a data-toggle="tab" role="tab" href="{{ '#tab-technical-card-' . $film->getId() }}">
                           <div class="row tab-icon">
                                <div class="col-md-5 tab-tech-card">
                                  <div class="link">
                                        <img src="/imgs/programacion/iconos/technical-card.png"
                                         title="@lang('exhibitions.frontend.film.show.fields.technical_card')"
                                         alt="@lang('exhibitions.frontend.film.show.fields.technical_card')"> 
                                    </div> 
                                </div>
                                <div class="col-md-7 tab-tech-card">
                                    <p>
                                        @lang('exhibitions.frontend.film.show.fields.technical_card')
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- Pestaña Trailer /4by3 -->
                    <li class="border" role="presentation">
                        <a data-toggle="tab" role="tab" href="{{ '#tab-trailer-' . $film->getId() }}">
                           <div class="row tab-icon">
                                <div class="col-md-5 trailer-img tab-trailer-notes">
                                     <div class="link">
                                        <img src="/imgs/programacion/iconos/trailer.png"
                                         title="@lang('exhibitions.frontend.film.show.fields.trailer')"
                                         alt="@lang('exhibitions.frontend.film.show.fields.trailer')"> 
                                    </div> 
                                </div>
                                <div class="col-md-7 tab-trailer-notes">
                                    <p>
                                        @lang('exhibitions.frontend.film.show.fields.trailer')
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- Pestaña Notas -->
                    <li class="border" role="presentation">
                        <a data-toggle="tab" role="tab" href="{{ '#tab-notes-' . $film->getId() }}">
                           <div class="row tab-icon">
                                <div class="col-md-5 tab-trailer-notes">
                                    <div class="link">
                                        <img src="/imgs/programacion/iconos/notes.png"
                                         title="@lang('exhibitions.frontend.film.show.fields.notes')"
                                         alt="@lang('exhibitions.frontend.film.show.fields.notes')"> 
                                    </div> 
                                </div>
                                <div class="col-md-7 tab-trailer-notes">
                                    <p> 
                                        @lang('exhibitions.frontend.film.show.fields.notes')
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    @if (isset($exhibition))
                    <!-- Contenedor de la pestaña Horarios -->
                    <div id="{{ 'tab-schedules-' . $film->getId() }}" class="tab-pane active" role="tabpanel">
                        <li class="list-group-item margin schedules-margin scroll-over">

                            <div class="panel panel-default no-line">
                                <table class="table table-responsive">

                                    <!-- Se presenta en las salas, fechas y horarios -->
                                    @foreach ($exhibition->getSchedules()->only($date)->groupByAuditorium() as $schedules)

                                        <tr>
                                            <td class="col-md-4 underline color-underline bold">
                                                <a href="{{ URL::route('exhibition.auditorium.index') }}">
                                                    <span class="icon icon-location">
                                                   {{ $schedules->first()->getAuditorium()->getName() }}
                                                </a>
                                            </td>
                                            <td class="col-md-3">
                                                @lang('exhibitions.frontend.exhibition.show.date',
                                                    [
                                                        'numeric_day' => $schedules->first()->getEntry()->day,
                                                        'textual_month' => trans('dates.months.' . $schedules->first()->getEntry()->format('F')),
                                                        'year' => $schedules->first()->getEntry()->year
                                                    ])
                                            </td>
                                            <td class="col-md-5">
                                                {{ HTML::schedulesTimeAsList($schedules) }} hrs.
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                                <!-- Botón que desplegará más horarios -->
                                <div class="row film-tabs">
                                    <button type="button"
                                            class="btn btn-default loading-xsm more-schedules"
                                            data-href="{{ URL::route('exhibition.schedule.search', ['exhibitionId' => $exhibition->getId()]) }}"
                                            data-since="{{ isset($date) ? $date->copy()->addDay()->format(MYSQL_DATE_FORMAT) : ''  }}"
                                            title="@lang('exhibitions.frontend.exhibition.show.see_more_schedules')">
                                            @lang('exhibitions.frontend.exhibition.show.see_more_schedules')
                                    </button>
                                    <div class="collapse">
                                        {{-- This content is loaded with AJAX and it is located in --}}
                                        {{-- views/frontend/exhibitions/partials/more-schedules    --}}
                                    </div>
                                </div>

                            </div>
                        </li>
                    </div>
                    @endif

                    <!-- Contenedor de la pestaña Sinopsis -->
                    <div id="{{ 'tab-synopsis-' . $film->getId() }}" class="tab-pane" role="tabpanel">
                        <li class="list-group-item margin synopsis-margin scroll-over">
                            <p>{{ $film->getSynopsis() }}</p>
                        </li>
                    </div>

                    <!-- Contenedor de la pestaña Ficha técnica -->
                    <div id="{{ 'tab-technical-card-' . $film->getId() }}" class="tab-pane" role="tabpanel" >
                        <li class="list-group-item margin scroll-over">
                            <table class="table table-bordered">
                                {{ HTML::technicalCard($film) }}
                            </table>
                        </li>
                    </div>

                    <!-- Contenedor de la pestaña Trailer /4by3 -->
                    <div id="{{ 'tab-trailer-' . $film->getId() }}" class="tab-pane" role="tabpanel" >
                        <li class="list-group-item margin embed-responsive embed-responsive-16by9">
                            <p>{{ $film->getTrailer() }}</p>
                        </li>
                    </div>

                    <!-- Contenedor de la pestaña Notas -->
                    <div id="{{ 'tab-notes-' . $film->getId() }}" class="tab-pane" role="tabpanel" >
                        <li class="list-group-item margin scroll-over">
                            <p>
                                <strong>
                                    @lang('exhibitions.frontend.exhibition.show.film_notes')
                                </strong>
                                :
                                {{ $film->getNotes() }}
                            </p>
                            @if (isset($exhibition) && !empty($exhibition->getNotes()))
                                <p>
                                    <strong>
                                        @lang('exhibitions.frontend.exhibition.show.exhibition_notes')
                                    </strong>
                                    : {{ $exhibition->getNotes() }}
                                </p>
                            @endif
                        </li>
                    </div>

                </div><!-- End Tab panes -->

            </div><!--End Nav tabs -->
        </div>
    </div>
</div>
