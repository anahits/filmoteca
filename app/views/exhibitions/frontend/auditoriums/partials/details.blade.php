<div class="panel panel-default">
    <div class="panel-heading">
        <h3>
            <span class="name">
                {{ $auditorium->getName() }}
            </span>
            @if ($auditorium->getVenue() !== null)
                <span class="venue">
                    - {{ $auditorium->getVenue()->getName() }}
                </span>
            @endif
        </h3>
    </div>

    <div class="panel-body">
        {{-- toggle between the position (left or right) of the auditorium image --}}
        <div class="col-sm-8">
            <div class="details {{ $side }}">
                <p>
                    <b>@Lang('exhibitions.frontend.auditorium.show.direction'):</b>
                    <span>
                        {{ $auditorium->getAddress() }}
                    </span>
                </p>

                <p>
                <b>@Lang('exhibitions.frontend.auditorium.show.telephone'):</b>
                <span>
                    {{ $auditorium->telephone }}
                </span>
            </p>
             <p>
                <b>@Lang('exhibitions.frontend.auditorium.show.schedule'):</b>
                <span>
                {{ $auditorium->schedule }}
                </span>
            </p>
            <p>
                <b>@Lang('exhibitions.frontend.auditorium.show.general_cost'):</b>
                <span>
                {{ $auditorium->general_cost }}
                </span>
            </p>
             <p>
                <b>@Lang('exhibitions.frontend.auditorium.show.special_cost'):</b>
                <span>
                {{ $auditorium->special_cost }}
                </span>
            </p>
             <p>
                <b>@Lang('exhibitions.frontend.auditorium.show.venue'):</b>
                <span>
                {{ (isset($auditorium->venue))? $auditorium->venue->name : 'Ninguna' }}
                </span>
            </p>
                
            </div>

            <div class="col-sm-11">
                <div class="map embed-responsive embed-responsive-16by9">
                  {{ $auditorium->map }}
                </div>
            </div> 
        </div>
        <div class= "col-sm-4">
            <div class="img-responsive {{ $side}}">
                    <img src="{{ $auditorium->getImage()->getMediumImageUrl()}}"
                         title="{{ $auditorium->getName() }}"
                         alt="{{ $auditorium->getName() }}"
                         class="img-responsive">     
            </div>
        </div>
        
    </div>
</div>
