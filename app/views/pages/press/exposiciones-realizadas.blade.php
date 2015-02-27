
@section('breadcrumbs')
	<li>
		<a href="/pages/acervo/index">
			Difusión
		</a>
	</li>
	<li class="active">
		Exposiciones / Exposiciones realizadas
	</li>
@stop


@section('sidebar')
	@include('elements.menus.press', array('selected' => 1))
@stop


@section('content')

    <h2>EXPOSICIONES REALIZADAS</h2>

	       <div class="col-xs-12 col-sm-12">

           <div class="row">

            <div class="col-6 col-sm-6 col-lg-6">
              <h4>EL CINE Y LA REVOLUCIÓN MEXICANA</h4>
              <img src="/imgs/exposiciones/cine-revolucion.jpg" class="img-responsive" 'La mancha de sangre'></a>
              <p>Entre las figuras chiapanecas más destacadas de la cinematografía nacional se encuentra Carlos Villatoro, quien trabajo con directores como Fernando de Fuentes, Juan Bustillo Oro, Gabriel García Moreno y Miguel Contreras Torres. También </p>
              <p><a class="btn btn-default" href="/pages/press/exposicion-revolucion" target="_blank" role="button">Leer más »</a></p>
            </div><!--/span-->
            
            <div class="col-6 col-sm-6 col-lg-6">
              <h4>EL CINE FRANCÉS CON LOS FOTÓGRAFOS DE MAGNUM</h4>
              <img src="/imgs/exposiciones/magnum.jpg" class="img-responsive" 'Drácula'></a>
              <p>La Filmoteca de la UNAM conmemora el 10º aniversario luctuoso de Henri Cartier-Bresson (1908-2004), con una exposición que exhibe un amplio panorama dela cinematografía francesa plasmado por los fotografos de la agencia Magnum</p>
              <p><a class="btn btn-default" href="/pages/press/exposicion-magnum" target="_blank" role="button">Leer más »</a></p>
            </div><!--/span-->
            

          </div><!--/row-->
        </div><!--/span-->


@stop