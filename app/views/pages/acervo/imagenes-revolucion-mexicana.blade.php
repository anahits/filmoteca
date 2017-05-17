
@section('breadcrumbs')
	<li>
		<a href="/pages/acervo/filmico">
			Acervo
		</a>
	</li>
	<li>
		<a href="/pages/acervo/biblioteca">
			Biblioteca
		</a>
	</li>
	<li>
		<a href="/pages/acervo/colecciones">
			Colecciones
		</a>
	</li>
	<li>
		<a href="/pages/acervo/fundacion-salvador-toscano">
			Fundación Salvador Toscano
		</a>
	</li>
	<li class="active">
		Imágenes de la Revolución Mexicana
	</li>
@stop


@section('sidebar')
	@include('elements.menus.acervo', array('selected' => 2))
@stop


@section('content')

    {{ $page->body }}

@stop