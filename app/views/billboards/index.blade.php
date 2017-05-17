@section('content')

<h2>Lista de carteleras</h2>

{{ $resources->links() }}

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Link versión online</th>
			<th>Link de descarga</th>
			<th>Imagen</th>
			<th>Background</th>
			<th>Fecha de creación</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>
		@foreach($resources as $billboard )
			<tr>
				<td>{{ $billboard->id }}</td>
				<td><a href="{{ $billboard->online_version_url }}">Link</a></td>
				<td><a href="{{ $billboard->pdf->url() }}">Link</a></td>
				<td><img src="{{ $billboard->image->url('thumbnail') }}">Link</td>
				<td><img src="{{ $billboard->image->url('background') }}">Link</td>
				<td>{{ $billboard->created_at }}</td>
				<td>
					{{ HTML::linkRoute('admin.billboard.show', 'Ver',
						array($billboard->id),
						array('class'=> 'btn btn-success')) }}
					<br>
					{{ Form::open(array('route' => array('admin.billboard.destroy', $billboard->id), 'method'=> 'DELETE')) }}
						<button class="btn btn-danger" type="submit">Borrar</button>
					{{ Form::close()}}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
