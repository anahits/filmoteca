@section('breadcrumbs')
	<li>
		<a href="/pages/concursos/jose-rovirosa">
			Concursos
		</a>
	</li>
	<li class="active">
		Alfonso Reyes "Fósforo"
	</li>
@stop

@section('sidebar')
	@include('elements.menus.concursos', array('selected' => 1))
@stop


@section('content')

    {{ $page->body }}

@stop
