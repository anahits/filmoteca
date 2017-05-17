<div class="panel panel-default">
	<div class="panel-heading small-heading">
		<div class="icon">
			@if ($exhibition->getType() !== null)
				<div class="row">
					<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 ciclo-icon program-ciclo">
					    <div class="link">
							<img src="{{ $exhibition->getType()->getImage()->getSmallImageUrl() }}" class="image-size-thumbnail">
					    </div> 
					</div>
					<div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 program-ciclo">
						<a href="{{ URL::route('exhibitions.frontend.cycle.index') }}">
							<h3 class="fixed underline">{{ $exhibition->getType()->getName() }}</h3>
						</a>
					</div>
				</div>
			@endif
		</div>
	</div>


	<div class="panel-body exhibition">
		<!-- Exhibición (Información completa de la película) -->
		@include(
			'exhibitions.frontend.films.partials.details',
			['film' => $exhibition->getFilm(), ['exhibitionNotes' => $exhibition->getNotes() ]]
		)
	</div>
</div>
