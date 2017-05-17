<p class="image-billboard">
    <img src="{{ asset( $billboard->image->url('medium')) }}"
         class="img-responsive center-block"
         title="@lang('dates.months.' . date('F', strtotime($billboard->created_at)))"
         alt="@lang('dates.months.' . date('F', strtotime($billboard->created_at)))">
</p>
<p>
    <a href="{{ $billboard->pdf->url() }}" target="_blank">
        @lang('exhibitions.general.download')
    </a>/
    <a href="{{ $billboard->online_version_url }}" target="_blank">
        @lang('exhibitions.frontend.billboard.index.consult')
    </a>
</p>
