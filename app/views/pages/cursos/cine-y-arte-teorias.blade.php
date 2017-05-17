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
	Cine y arte: Teorías, tendencias, encuentros y desencuentros
</li>
@stop


@section('sidebar')
  @include('elements.menus.extension-academica', array('selected' => 0))
@stop



@section('content')

    {{ $page->body }}

@stop