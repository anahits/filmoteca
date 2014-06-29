@extends('layouts.default')

@section('scripts')
	{{ HTML::scripts(
		array(
			'bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js',
			'bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js',
			'/assets/js/Exhibitions.js')) }}
@stop

@section('styles')
	{{ HTML::styles(
		array(
			'bower_components/bootstrap-datepicker/css/datepicker3.css')) }}
@stop

@section('breadcrumb')
	<li class="active">
		Programación
	</li>
@stop

@section('content')

	<div class="exhibition_search">
		<div>
			<form class="form-inline">
				<div class="form-group pull-right">
					<label for="local_search">Busca película de este mes:</label>
					<input type="text" 
						placeholder="título o director"
						class="form-control">
				</div>
			</form>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="sidebar">
		<div class="static-pages-menu">
			<ul>
				<li class="has-sub">
					<a>
						<span>
							Salas
						</span>
					</a>
					<ul>
						@foreach($auditoriums as $auditorium )
							<li class="last">
								<a>
									<span>{{$auditorium->name}}</span>
								</a>
							</li>
						@endforeach
					</ul>
				</li>

				<li class="has-sub">
					<a>
						<span>Funciones Especiales</span>
					</a>
					<ul>
						@foreach($icons as $icon)
							<li class="last">
								<a>
									<span>
										{{ HTML::image($icon->icon, $icon->name) }}
									</span>
								</a>
							</li>
						@endforeach
					</ul>
				</li>

				<li class="has-sub">
					<a>
						<span>Consultar programación</span>
					</a>
					<ul>
						<li class="has-sub">
							<a><span>por día</span></a>
							<ul>
								<li>
									<div id="datepicker"></div>
								</li>
							</ul>
						</li>

						<li class="has-sub">
							<a id="by-week">
								<span>de la semana</span>
							</a>
								<ul>
								{{-- Poner 4 entradas de la semana --}}
								</ul>
						</li>

						<li class="last">
							<a>
								<span>del mes</span>
							</a>
						</li>

					</ul>
				</li>
			</ul>
		</div>

		<div class="subscribe-box">
			
			<p>Si deseas recibir cada mes la cartelera digital en tu correo electronico escribelo 
			la siguiente caja de texto.</p>

			<div class="input-group input-group-sm">
				<input type="email" 
					name="email" 
					placeholder="Tu correo electronico"
					class="form-control">
				<span class="input-group-addon">@</span>
			</div>

			<button type="button" class="btn btn-success">Suscribirse</button>
		</div>
	</div>

	<div class="content">

		<h3>Programación de la semana actual</h3>

		<div class="wrapper-items" id="wrapper-items">

			<div class="without-results" id="without-results">
				No se encontraron películas con
				los filtros solicitados
			</div>

			<ul class="items" id="items">

				@foreach( $exhibitions as $exhibition )

					<li class="thumbnail item">
						<img src="{{ $exhibition->exhibition_film->film->thumbnail_image }}"
							alt="{{ $exhibition->exhibition_film->film->title }}">
						{{ 
							HTML::linkAction(
							'ExhibitionController@detail',
							str_limit(
								$exhibition->exhibition_film->film->title,
								20),
							array( $exhibition->id ),
							array('title' => 'Ver detalles')) 
						}}
					</li>

				@endforeach
			</ul>
		</div>
	</div>
	
@stop