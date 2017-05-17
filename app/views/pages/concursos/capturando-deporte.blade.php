@section('breadcrumbs')
	<li>
		<a href="/pages/concursos/jose-rovirosa">
			Concursos
		</a>
	</li>
	<li class="active">
		Capturando el deporte y el juego en mi plantel
	</li>
@stop

@section('sidebar')
	@include('elements.menus.concursos', array('selected' => 4))
@stop


@section('content')

    {{ $page->body }}

@stop
