@section('breadcrumbs')
<li>
	<a href="/pages/servicios/index">
		Servicios
	</a>
</li>
<li class="active">
	Requisitos para solicitar un servicio
</li>
@stop


@section('sidebar')
	@include('elements.menus.servicios', array('selected' => 9))
@stop


@section('content')

	<h1>Requisitos para solicitar un servicio</h1>


	<p>Para solicitar formalmente algún servicio de la Filmoteca se debe presentar una Carta dirigida a la Directora General de Actividades Cinematográficas, Licenciada María Guadalupe Ferrer Andrade, con las siguientes características:</p>
		<ol>
			<li>Datos completos de la institución o persona que requiere el servicio.</li>
			<li>Explicación del proyecto y finalidad con la que se ocupará el material.</li>
			<li>Especificar qué tipo de material necesita:
				<ul>
					<li>En caso de tratarse de alguna película, es necesario especificar el título requerido, para su pronta localización.</li>
					<li>Si solicita imágenes es importante que detalle qué tipo de imágenes requiere.</li>
				</ul>
			</li>
			<li>Formato en el que se necesita el material.</li>
			<li>Fecha aproximada en la que requiere el material.</li>
			<li>Mencionar los canales de difusión del producto, en su caso.</li> 
			<li>Compromiso de otorgarle crédito a los archivos de la Filmoteca.</li> 
		</ol>

	<p>Nota: Para acceder a libros, revistas, DVD y VHS para el Centro de documentación sólo es necesario presentarse a las instalaciones de la Filmoteca en el horario de 8:30 a 18:30 de lunes a viernes, para el resto del material es necesario hacer el procedimiento general.</p>

	<p>Cada área se encargará de responder si existe el material solicitado o no en el acervo, si lo están para las fechas solicitadas; también informa sobre las tarifas y condiciones bajo las que se deberán manejar los materiales.</p>
	<p>Las solicitudes se responden en un lapso de 1 a 4 días hábiles. La Filmoteca cuenta con una lista de precios fija para la utilización de su material, los estudiantes de la UNAM e instituciones afiliadas, así como los proyectos culturales tienen derecho a un descuento.</p>

	
@stop