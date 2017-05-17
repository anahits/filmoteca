@section('scripts')

<!-- This plugin requires jquery 1.7 to work. This jQuery's version is packaged with slider-camera plugin. -->
<script type='text/javascript' src='/bower_components/slider-camera/scripts/jquery.min.js'></script>
<script type='text/javascript' src='/bower_components/slider-camera/scripts/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='/bower_components/slider-camera/scripts/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='/bower_components/slider-camera/scripts/camera.min.js'></script>

<script>
  jQuery(function(){

   jQuery('#camera_wrap_1').camera({
    thumbnails: true
  });
 });
</script>

@stop

@section('styles')
  <link rel='stylesheet' id='camera-css'  href='/bower_components/slider-camera/css/camera.css' type='text/css' media='all'> 
@stop

@section('breadcrumbs')
    <li>
        <a href="/press_register">
            Difusión
        </a>
    </li>
    <li>
        <a href="/pages/difusion/exposiciones-museografia">
            Exposiciones
        </a>
    </li>
    <li>
        <a href="/pages/difusion/exposiciones-recientes">
            Exposiciones recientes
        </a>
    </li>
    <li class="active">
        Exposición La juventud en el cine mexicano
    </li>
@stop


@section('sidebar')
    @include('elements.menus.difusion', array('selected' => 1))
@stop


@section('content')

    {{ $page->body }}

@stop