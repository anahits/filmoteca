@section('content')

{{ Form::open(
	[
		'route' => 'admin.billboard.store',
		'files' => true,
		'method'=> 'POST',
		'class' => 'form-horizontal panel panel-default'
	])}}

	<div class="panel-heading">
		<h2>Agregar cartelera</h2>
	</div>

	<div class="panel-body">

		{{ Form::formGroup('text','online_version_url', 'URL de la versión en linea', 'form') }}

		{{ Form::formGroup('file','pdf', 'Pdf', 'form') }}

		{{ Form::formGroup('file', 'image', 'Imagen', 'form') }}

		{{ Form::formGroup('file', 'background', 'Imagen', 'form') }}
	</div>

	<div class="panel-footer">
		<button class="btn btn-success pull-right" type="submit">Agregar</button>
		<div class="clearfix"></div>
	</div>

{{ Form::close() }}

@stop
