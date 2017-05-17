<div class="flm-section banner-programacion">
    @for ($j=1; $j<=3; $j++)
        @if (isset($advertisements['banner-program-' . $j]))
            <div class="link">
                <a class="link" target="_blank" href="{{ $advertisements['banner-program-' . $j]->link }}">
                    <img class="img-responsive" src="{{ Config::get('administrator::administrator.cms_upload_url') . $advertisements['banner-program-' . $j]->poster }}"
                        alt="{{ $advertisements['banner-program-' . $j]->title }}"
                        title="{{ $advertisements['banner-program-' . $j]->title }}"
                        >
                </a>
            </div> 
        @endif
    @endfor  
</div>