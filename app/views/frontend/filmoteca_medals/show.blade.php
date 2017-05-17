{{-- Modal Content --}}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">
        <span class="name">{{ $winner->name }} </span>
        <p class="name">@lang('exhibitions.frontend.medal.index.entrega'):
        @lang(
        'exhibitions.frontend.medal.index.fecha',
        	[
            'numeric_day' => $winner->award_date->format('d'),
            'textual_month' => @trans('dates.months.' . $winner->award_date->format('F')),
            'numeric_year' => $winner->award_date->format('Y'),
        	]
    	)</p>

    </h4>
</div>
<div class="modal-body">
    <div><img src="{{ $winner->image->url('thumbnail') }}" class="img-responsive center-block thumbnail"></div>
    <div class="bibliography">{{ $winner->biography }}</div>
</div>
<div class="modal-footer"></div>

