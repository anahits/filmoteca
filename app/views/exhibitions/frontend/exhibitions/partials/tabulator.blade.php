{{ $results->links() }}

<table class="table table-striped table-bordered table-responsive">
	<thead>
		<tr>
			<th>Título de la película</th>
			<th>Director</th>
			<th>Horarios</th>
			<th>Portada</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>
		@foreach($results as $exhibition )
			<tr>
				<td>{{ $exhibition->exhibition_film->film->title }}</td>
				<td>{{ $exhibition->exhibition_film->film->director }}</td>

				<td>
				@foreach( $exhibition->auditoriums as $auditorium)
					<div class="panel panel-default">
						<div class="panel-heading">{{ $auditorium->name }}</div>
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
				</td>

				<td><img src="{{ $exhibition->exhibition_film->film->image->url('thumbnail') }}" alt="{{ $exhibition->exhibition_film->film->title }}" class="image thumbnail cover"></td>
				<td>
					@if( !isset($editable))
						{{ HTML::linkRoute('admin.exhibition.show', 'Ver',
							array($exhibition->id),
							array('class'=> 'btn btn-success show')) }}
						<br>
						{{ Form::open(array('route' => array('admin.exhibition.destroy', $exhibition->id), 'method'=> 'DELETE')) }}
							<button class="btn btn-danger" type="submit">Borrar</button>
						{{ Form::close()}}
					@else
						{{ HTML::linkRoute('exhibition.show', 'Ver',
							array($exhibition->id),
							array('class'=> 'btn btn-success')) }}
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
