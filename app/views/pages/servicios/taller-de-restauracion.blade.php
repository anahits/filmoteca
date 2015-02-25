@section('breadcrumbs')
<li>
	<a href="/pages/servicios/index">
		Servicios
	</a>
</li>
<li class="active">
	Taller de restauración
</li>
@stop

@section('sidebar')
	@include('elements.menus.servicios', array('selected' => 8))
@stop



@section('content')

	<div class="img-servicios">
		<img src="/imgs/servicios/taller-restauracion.jpg" aling="left">
	</div>

	<h1>Taller de restauración </h1>

	<p>Una de las funciones principales de la Dirección General de Actividades Cinematográficas - Filmoteca de la UNAM, es rescatar y restaurar el patrimonio fílmico de la UNAM con el fin de preservar la memoria fílmica del país para el futuro.</p>

	<p>Para ello cuenta con un Taller de restauración, que se encarga de revisar los materiales cinematográficos que ingresan a la Filmoteca de la UNAM, darles mantenimiento e identificar si tienen daños, y si es necesario, restaurarlos. Así mismo, detecta las películas que presentan el “síndrome de vinagre” y evita que el problema se extienda a otros materiales.</p>

	<p>Para un mayor control y conservación del material, el Taller de Restauración almacena el material en las bóvedas especializadas, donde se controlan los niveles de temperatura y humedad para evitar el deterioro del material. </p>

	<p>Como ejemplo de las labores de restauración que la Filmoteca de la UNAM ha realizado, se encuentra la película <i>El puño de hierro</i>, película silente mexicana de 1927, nunca editada, que fue restaurada y preparada dentro del Taller de restauración de la Filmoteca para su exhibición.</p>

	<p>Además de la función de restaurar, el Taller brinda la posibilidad a extranjeros y nacionales de realizar pasantías, durante las cuales se les capacita en el arte de la restauración.</p>

	<p>Si estás interesado en nuestros servicios comunícate.</p>
	
	<br>
	<p>Contacto: Albino Álvarez, Subdirector de rescate y restauración </p>
	<p>Tel: 5622 9584</p>
	<p>Correo electrónico: <a href="mailto:algoal57@unam.mx">algoal57@unam.mx</a></p>
	<br>

	<p>Contacto: José Antonio Valencia, Taller de restauración</p>
	<p>Tel: 5622 9598 </p>
	<p>Correo electrónico: <a href="mailto:vallopja@unam.mx">vallopja@unam.mx</a></p>
	
<!-- 	<audio controls>
		<source src="/filmoteca-master/video/audioPordenone.mp3">
	</audio> -->

@stop