@section('content')

<h2>Detalles de catálogo</h2>

<div class="text-right">
{{ Form::open(array('route' => array('admin.billboard.destroy', $resource->id), 'method'=> 'DELETE')) }}
	<button class="btn btn-danger navbar-btn" type="submit">Borrar</button>

{{ Form::close()}}
</div>

<table class="table bordered condensed">
	<thead>
		<tr>
			<th>Campo</th>
			<th>Valor</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>ID</th>
			<td>{{$resource->id }}</td>
		</tr>
		<tr>
			<th>Versión en linea</th>
			<td><a href="{{ $resource->online_version_url }}" target="_blank">Link</a></td>
		</tr>
		<tr>
			<th>PDF para descargar</th>
			<td><a href="{{ $resource->pdf->url() }}">Link</a></td>
		</tr>
		<tr>
			<th>Imagen</th>
			<td><img src="{{ $resource->image->url('thumbnail') }}">Link</td>
		</tr>
		<tr>
			<th>Background</th>
			<td><img src="{{ $resource->background->url('standard') }}">Link</td>
		</tr>
	</tbody>
</table>

<div class="text-right">
{{ Form::open(array('route' => array('admin.billboard.destroy', $resource->id), 'method'=> 'DELETE')) }}
	<button class="btn btn-danger navbar-btn" type="submit">Borrar</button>
{{ Form::close()}}
</div>

@stop
