@section('scripts')
{{ HTML::scripts(array(
	'/bower_components/jquery/dist/jquery.min.js',
	'/bower_components/bootstrap/dist/js/bootstrap.min.js',
 	'/bower_components/slick.js/slick/slick.min.js',
	'/bower_components/jqueryui/ui/minified/jquery.ui.core.min.js',
	'/bower_components/jqueryui/ui/minified/jquery.ui.widget.min.js',
	'/bower_components/jqueryui/ui/minified/jquery.ui.accordion.min.js',
	'/assets/js/static-pages/directorio.js')) }}
@stop

@section('styles')
{{ HTML::styles(array(
	'/bower_components/jqueryui/themes/smoothness/jquery-ui.css',
	'/bower_components/jqueryui/themes/smoothness/jquery.ui.theme.css')) }}
@stop





@section('breadcrumbs')
<li>
	<a href="/pages/quienes-somos/mision-y-vision">
		Quiénes somos
	</a>
</li>
<li class="active">
	Directorio
</li>
@stop





@section('sidebar')
	@include('elements.menus.quienes-somos', array('selected' => 7))
@stop


@section('content')

    {{ $page->body }}

@stop