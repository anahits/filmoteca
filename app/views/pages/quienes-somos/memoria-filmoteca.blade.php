@section('breadcrumbs')
	<li>
		<a href="/pages/quienes-somos/index">
			Quiénes somos
		</a>
	</li>
	<li class="active">
		Memoria Filmoteca
	</li>
@stop

@section('sidebar')
	@include('elements.menus.quienes-somos', array('selected' => 3))
@stop


@section('content')

	
	<h1>Memoria Filmoteca </h1>

	<p>
		La Memoria Filmoteca es un informe de las actividades más relevantes que realizamos a lo largo de un año, y que se son publicadas en la Memoria UNAM, publicación anual que reúne los informes de todas las entidades universitarias.
	</p>

	<p>Aquí puedes conocer las actividades que hemos realizado año, tras año:</p>
	
	<h2></h2>

	<ul>
		<div class="row">
		
		<div class="col-sm-12">
			<li>
				<img src="/assets/imgs/descarga-PDF.png"><a href="http://www.planeacion.unam.mx/Memoria/2013/PDF/8.2-DGAC.pdf" target="_blank">    Memoria Filmoteca 2013</a>
			</li>
		</div>
		<br><br><br>
		<div class="col-sm-12">

			<li>
				<img src="/assets/imgs/descarga-PDF.png" aling="left"><a href="http://www.planeacion.unam.mx/Memoria/2012/PDF/8.2-DGAC.pdf">    Memoria Filmoteca 2012</a>
			</li>
		</div>
		<br><br><br>
		<div class="col-sm-12">

			<li>
				<img src="/assets/imgs/descarga-PDF.png" aling="left"><a href="http://www.planeacion.unam.mx/Memoria/2011/PDF/8.2-DGAC.pdf">    Memoria Filmoteca 2011</a>
			</li>
		</div><br>
		<br><br>
		<div class="col-sm-12">
			<li>
				<img src="/assets/imgs/descarga-PDF.png" aling="left"><a href="http://www.planeacion.unam.mx/Memoria/2010/PDF/8.2-DGAC.pdf">    Memoria Filmoteca 2010</a>
			</li>
		</div>
		<br><br><br>
		<div class="col-sm-12">
			<li>
				<img src="/assets/imgs/descarga-PDF.png"><a href="http://www.planeacion.unam.mx/Memoria/2009/PDF/8.2-DGAC.pdf" target="_blank">    Memoria Filmoteca 2009</a>
			</li>
		</div>
		<br><br>
		<br>
		<div class="col-sm-12">
			<li>
				<img src="/assets/imgs/descarga-PDF.png" aling="left"><a href="http://www.planeacion.unam.mx/Memoria/2008/PDF/61107.pdf">    Memoria Filmoteca 2008</a>
			</li>
		</div>
		<br><br>
		<br>
		<div class="col-sm-6">
			<li>
				<img src="/assets/imgs/descarga-PDF.png"><a href="http://www.planeacion.unam.mx/Memoria/2007/PDF/61101mem.pdf" target="_blank">   Memoria Filmoteca 2007</a>
			</li>
		</div>
	</ul>

</div>

@stop




