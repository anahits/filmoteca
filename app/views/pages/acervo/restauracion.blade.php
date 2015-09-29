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
		<a href="/pages/acervo/filmico">
			Acervo
		</a>
	</li>
	<li class="active">
		Restauración
	</li>
@stop


@section('sidebar')
	@include('elements.menus.acervo', array('selected' => 3))
@stop


@section('content')

    {{ $page->body }}

@stop