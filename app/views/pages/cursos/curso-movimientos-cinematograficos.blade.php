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
	Curso: Movimientos Cinematográficos, segunda mitad del siglo XX
</li>
@stop


@section('sidebar')
  @include('elements.menus.extension-academica', array('selected' => 0))
@stop


@section('content')

    {{ $page->body }}

@stop