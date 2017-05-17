<div class="subscribe-box hidden-xs">
    {{ Form::open(['route' => 'exhibitions.frontend.billboard.subscribe', 'method' => 'GET']) }}
    <p>@lang('exhibitions.frontend.exhibition.show.receive_our_digital_billboard')</p>

    <div class="input-group input-group-sm">
        <input type="email" name="email" placeholder="@lang('exhibitions.frontend.exhibition.show.enter_your_email')" class="form-control">
        <span class="input-group-addon">@</span>
    </div>

    <button type="button" class="btn btn-success">@lang('exhibitions.frontend.exhibition.show.send')</button>
    {{ Form::close() }}
</div>
