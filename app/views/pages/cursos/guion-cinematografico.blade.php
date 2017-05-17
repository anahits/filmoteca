@section('breadcrumbs')
<li>
  <a href="/pages/cursos/cursos-y-talleres">
    Extensión Academica
  </a>
</li>
<li>
<a href="/pages/cursos/cursos-y-talleres">
    Cursos y talleres
  </a>
</li>
<li>
  <a href="/pages/cursos/cursos-anteriores">
    Cursos Anteriores
  </a>
</li>
<li class="active">
	Taller de guión cinematográfico; trama y construcción de personajes
</li>
@stop


@section('sidebar')
  @include('elements.menus.extension-academica', array('selected' => 0))
@stop


@section('content')

    {{ $page->body }}

@stop