{{--
Vista parcial
--}}
<div class="details">
	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
		<h1>{{ $exhibition->exhibition_film->film->title }}</h1>
	</div>
	<div class="panel-footer">
		@if( !is_null($exhibition->type) )
			<p>{{ HTML::image(
				$exhibition->type->image->url('thumbnail'), 
				$exhibition->type->name,
				['class' => 'image-size-icon']
				) }}
					{{ $exhibition->type->name }}
			</p>
		@endif
	</div>

	<div class="modal-body">
		<div class="row">
			<div class="col-sm-6 cover">
				<div>

					<img src="{{ $exhibition->exhibition_film->film->image->url('medium') }}"
					alt="{{ $exhibition->exhibition_film->film->title }}" >

				</div>

				<div class="fb-like"
					 data-href="{{ URL::action('ExhibitionController@detail', array('id' => $exhibition->id ))}}"
					 data-layout="standard"
					 data-action="like"
					 data-show-faces="true"
					 data-share="true">
				</div>

				<div class="col-sm-12 cover">
				<div class="panel panel-default">
					<div class="panel-heading">Se presenta en las Salas: </div>
					<div class="panel-body">
						@foreach( $exhibition->auditoriums as $auditorium)
							<div class="panel panel-default">
								<div class="panel-heading">
								    {{ $auditorium->name }}
								    {{ HTML::linkAction('AuditoriumController@show', 'Ver ubicación', ['id' => $auditorium->id]) }}
								</div>
								<div class="panel-body">
									<ul class="list-group">						
									@foreach( $exhibition->schedulesByAuditorium($auditorium->id) as $date => $hours)
										<li class="list-group-item">
											{{ ucfirst(trans('dates.days.' . date('l', strtotime($date)) )) }}
											{{ date(' j \d\e ', strtotime($date)) }}
											{{ trans('dates.months.' . date('F', strtotime($date)) ) }}
											<br>

											@foreach($hours as $hour)
												<span class="label label-default">{{ date('G:i \h\r\s', strtotime($hour)) }}</span>
											@endforeach
										</li>
									@endforeach
									</ul>
								</div>
							</div>
						@endforeach
					</div>

				</div>	
			</div>
			</div>

			<div class="col-sm-6">
			    <div class="tecnical-card">
                    @foreach($exhibition->getTechnicalCard() as $title => $value)
                        <p>
                            <b>{{mb_strtoupper($title)}}: </b>
                            {{ $value }}
                        </p>
                    @endforeach
                </div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="embed-responsive embed-responsive-16by9">
				 	{{ $exhibition->exhibition_film->film->trailer }}
			 	</div>
			</div>
		</div>
		
	</div>
</div>