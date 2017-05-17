@section('breadcrumbs')
	<li>
		<a href="/pages/libreria/libreria">
			Libreria
		</a>
	</li>
	<li class="active">
		Catálogo
	</li>
@stop

@section('sidebar')
  @include('elements.menus.libreria', array('selected' => 2))
@stop


@section('content')

    {{ $page->body }}

@stop