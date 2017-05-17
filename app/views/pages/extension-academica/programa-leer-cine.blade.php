@section('breadcrumbs')
<li>
	<a href="/pages/cursos/cursos-y-talleres">
		Extensión Academica
	</a>
</li>
<li class="active">
	Programa Leer cine
</li>
@stop


@section('sidebar')
@include('elements.menus.extension-academica', array('selected' => 3))
@stop


@section('content')

    {{ $page->body }}

@stop
