@section('breadcrumbs')
	<li>
		<a href="/pages/concursos/jose-rovirosa">
			Concursos
		</a>
	</li>
	<li class="active">
		Corto móvil
	</li>
@stop

@section('sidebar')
	@include('elements.menus.concursos', array('selected' => 2))
@stop


@section('content')

    {{ $page->body }}

@stop
