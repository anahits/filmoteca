@section('breadcrumbs')
<li>
	<a href="/pages/servicios/index">
		Servicios
	</a>
</li>
<li class="active">
	Préstamo y alquiler de películas
</li>
@stop

@section('sidebar')
	@include('elements.menus.servicios', array('selected' => 6))
@stop



@section('content')

	<div class="img-servicios">
		<img src="/imgs/servicios/prestamo-alquiler.jpg" aling="left">
	</div>

	<h1>Préstamo y alquiler de películas</h1>


	<p>Muchas de las películas del acervo de la Filmoteca de la UNAM están disponibles para ser solicitadas en préstamo o alquiler. Es el caso de las películas que son programadas y exhibidas en las diversas salas de la UNAM en sus sedes dentro y fuera de Ciudad Universitaria,  asimismo, de las películas mexicanas que el Servicio Exterior Mexicano solicita regularmente  para exhibirlas a través de los Consulados mexicanos en el extranjero, y de las que continuamente se alquilan para festivales, muestras y ciclos de cine temáticos nacionales e internacionales.</p> 
	
	<p>La Unidad de Acceso Interinstitucional (UAI) está a cargo del servicio de préstamo y alquiler. Para obtener materiales, el solicitante debe especificar los títulos de las películas requeridas. La UAI se encarga de responder si los títulos existen o no en el acervo, los formatos en que están disponibles, y si lo están para las fechas solicitadas; también informa sobre las tarifas y condiciones bajo las que se deberán manejar los materiales.</p>
	
	<p>Si quieres hacer alguna solicitud, consulta los 
	{{ HTML::link(
		'/pages/servicios/requisitos-para-solicitar-un-servicio',
		'Requisitos para solicitar un servicio.' )                            
		}}</p>
		
	<p>Contacto: José Manuel García </p>
	<p>Tel: 5622 9597 </p>
	<p>Correo electrónico: <a href="mailto:mvng@unam.mx">mvng@unam.mx</a></p>


@stop