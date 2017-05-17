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
