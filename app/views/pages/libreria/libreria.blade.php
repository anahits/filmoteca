@section('scripts')

{{ HTML::scripts(array(
  '/bower_components/jquery/dist/jquery.min.js',
  '/bower_components/bootstrap/dist/js/bootstrap.min.js',
  '/bower_components/slick.js/slick/slick.min.js')) }}


<!-- This plugin requires jquery 1.7 to work. This jQuery's version is packaged with slider-camera plugin. -->
<script type='text/javascript' src='/bower_components/slider-camera/scripts/jquery.min.js'></script>
<script type='text/javascript' src='/bower_components/slider-camera/scripts/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='/bower_components/slider-camera/scripts/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='/bower_components/slider-camera/scripts/camera.min.js'></script>

<script>
$(document).ready(function(){
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
		<a href="/pages/libreria/libreria">
			Libreria
		</a>
	</li>
	<li class="active">
		Puntos de venta
	</li>
@stop


@section('sidebar')
	@include('elements.menus.libreria', array('selected' => 0))
@stop


@section('content')

    {{ $page->body }}

@stop