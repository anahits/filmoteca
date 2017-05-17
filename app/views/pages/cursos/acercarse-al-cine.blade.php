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
<li class="active">
Acercarse al cine: Introducción a la historia del cine y apreciación cinematográfica
</li>
@stop



@section('sidebar')
  @include('elements.menus.extension-academica', array('selected' => 0))
@stop


@section('content')

    {{ $page->body }}

@stop