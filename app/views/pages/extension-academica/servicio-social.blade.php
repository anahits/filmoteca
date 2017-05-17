@section('breadcrumbs')
<li>
	<a href="/pages/cursos/cursos-y-talleres">
		Extensión Academica
	</a>
</li>
<li class="active">
	Servicio Social
</li>
@stop



@section('sidebar')
	@include('elements.menus.extension-academica', array('selected' => 1))
@stop



@section('content')

    {{ $page->body }}

@stop
