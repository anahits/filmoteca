@section('breadcrumbs')
    <li>
        <a href="/pages/concursos/jose-rovirosa">
            Concursos
        </a>
    </li>
    <li class="active">
        Concurso José Rovirosa
    </li>
@stop

@section('sidebar')
    @include('elements.menus.concursos', array('selected' => 0))
@stop


@section('content')

    {{ $page->body }}

@stop
