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
					<a href="{{ URL::to('/exhibition') }}"><span class="icon icon-this-week"></span>Este mes</a>
				</div>
				
				<div class="btn-group">
					<div class="dropdown-toggle link" data-toggle="dropdown" aria-expanded="false">
						<a><span class="icon icon-cinemas"></span>Salas </a>
					</div>
					
					<ul class="dropdown-menu" role="menu">
						@foreach($auditoriums as $auditorium )
							<li>
								{{
								    HTML::link(
								        '/exhibition#/?name=byAuditorium&data=' . $auditorium->id .'&title=' . $auditorium->name,
							    	    $auditorium->name )
							    }}
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
								{{
								    HTML::link(
								        '/exhibition#/?name=byIcon&data=' . $icon->id . "&title=" . $icon->name,
								         $icon->name )
                                }}
							</li>
						@endforeach
					  </ul>
				</div>
			</div>
		</div>

		<div class="flm-section flm-subsection digital-billboard">
            <div class="content">
                <div class="image pull-left">
                    <img src="/imgs/home/cartelera/cartelera-home-diciembre2015.jpg">
                </div>
                <div class="caption pull-right">
                    <a href="http://issuu.com/filmotecaunam/docs/cartelera.digital.dicene2/1" title="Consulta la cartelera digital" alt="Consulta la cartelera digital"target="_blank">Consulta<span class="icon icon-download pull-right"></span></a>
                </div>   
                <div class="caption pull-right">
                    <a href="/pdf/cartelera/Cartelera.Digital.DicEne2.pdf" title="Descarga la cartelera digital" alt="Descarga la cartelera digital" target="_blank">Descarga<span class="icon icon-download pull-right"></span></a>
                </div>
            </div>
        </div>

	</div>
</div>
