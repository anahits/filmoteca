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


        <!-- Botón ver programación del ciclo-->
        <div class="row">
            <div class="col-md-12">
                <div align="right">
                    <a href="{{ URL::route('exhibitions.frontend.cycle.show', ['slug' => $cycle->getSlug()])}}">
                        <button type="button"
                                class="btn btn-default">
                                @lang('exhibitions.frontend.cycle.index.see_exhibitions')
                        </button>
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>
