<div class="flm-section programming">
	<div class="content">

		<div class="flm-section flm-subsection carrousel">
			<div class="content">
				<div class="header">
					<h3 class="text-center">Programación</h3>
					<h4 class="text-center">Hoy se exhibe</h4>
				</div>
				
				<div class="carrousel-widget">
				@foreach( $exhibitions as $exhibition)
					<div>
						<a href="{{ URL::route('exhibition.detail-home', $exhibition->id)}}" 
							data-toggle="modal" 
							data-target="#exhibition-modal">
							<img src="{{ URL::asset( $exhibition->exhibition_film->film->image->url('thumbnail') ) }}" 
								alt="{{ $exhibition->exhibition_film->film->title }}">
						</a>
					</div>
				@endforeach
				</div>
			</div>
		</div>

		@include('elements.bootstrap-modal')

		<div class="flm-section flm-subsection queries">
			<div class="content">
				<h5>Consulta:</h5>
	
				<div class="link">
					<a href="http://filmoteca.dev/exhibition"><span class="icon icon-this-week"></span>Este mes</a>	
				</div>
				
				<div class="btn-group">
					<div class="dropdown-toggle link" data-toggle="dropdown" aria-expanded="false">
						<a><span class="icon icon-cinemas"></span>Salas </a>
					</div>
					
					<ul class="dropdown-menu" role="menu">
						@foreach($auditoriums as $auditorium )
							<li>
								{{ HTML::link('/exhibition/filter/auditorium/' . $auditorium->id . '/' . rawurlencode($auditorium->name), $auditorium->name)}}
							</li>
						@endforeach
					 </ul>
				</div>

				<div class="btn-group">
					<div class="dropdown-toggle link" data-toggle="dropdown" aria-expanded="false">
						<a><span class="icon icon-ciclos"></span>Ciclos </a>
					</div>
					
					<ul class="dropdown-menu" role="menu">
						@foreach($icons as $icon )
							<li>
								{{ HTML::link('/exhibition/filter/especial-function/' . $icon->id . '/' . rawurlencode($icon->name), $icon->name )}}
							</li>
						@endforeach
					  </ul>
				</div>
			</div>
		</div>

		<div class="flm-section flm-subsection digital-billboard">
			<div class="content">
				<div class="image pull-left">
					<img src="/imgs/home/cartelera/cartelera-enero2015.jpg">
				</div>
				<div class="caption pull-right">
					<h5></h5>
					<span></span>
					<a href="http://issuu.com/filmotecaunam/docs/carteleradigitalfeb2015">Consulta<span class="icon icon-download pull-right"></span></a>
				</div>	
				<div class="caption pull-right">
					<a href="" target="_blank">Descarga<span class="icon icon-download pull-right"></span></a>
				</div>
			</div>
		</div>

	</div>
</div>