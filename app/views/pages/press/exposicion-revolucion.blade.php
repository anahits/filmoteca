@section('scripts')

<script type='text/javascript' src='/bower_components/slider-camera/jquery.min.js'></script>
<script type='text/javascript' src='/bower_components/slider-camera/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='/bower_components/slider-camera/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='/bower_components/slider-camera/camera.min.js'></script> 

<script>
  jQuery(function(){

   jQuery('#camera_wrap_1').camera({
    thumbnails: true
  });
 });
</script>

@stop

@section('styles')
  <link rel='stylesheet' id='camera-css'  href='/bower_components/slider-camera/css/camera.css' type='text/css' media='all'> 
@stop

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

    <div id="back_to_camera">
       
   
    <div class="fluid_container">

    <h2>EL CINE Y LA REVOLUCIÓN MEXICANA</h2>
    <br>
        <h5>Visita nuestras exposiciones - Filmoteca UNAM</h5>
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <div data-thumb="/imgs/exposiciones/revolucion/thumbs/exposicion-revolucion1.jpg" data-src="/imgs/exposiciones/revolucion/exposicion-revolucion1.jpg">
                <div class="camera_caption fadeFromBottom">
                    
                </div>
            </div>
            <div data-thumb="/imgs/exposiciones/revolucion/thumbs/exposicion-revolucion2.jpg" data-src="/imgs/exposiciones/revolucion/exposicion-revolucion2.jpg">
                <div class="camera_caption fadeFromBottom">
                    Inauguración de la exposición
                </div>
            </div>
            <div data-thumb="/imgs/exposiciones/revolucion/thumbs/exposicion-revolucion3.jpg" data-src="/imgs/exposiciones/revolucion/exposicion-revolucion3.jpg">
                <div class="camera_caption fadeFromBottom">
                    En la estación del metro Zócalo
                </div>
            </div>
            <div data-thumb="/imgs/exposiciones/revolucion/thumbs/exposicion-revolucion4.jpg" data-src="/imgs/exposiciones/revolucion/exposicion-revolucion4.jpg">
                <div class="camera_caption fadeFromBottom">
                    En la estación del metro Copilco
                </div>
            </div>
            
            
        </div><!-- #camera_wrap_1 -->

    </div><!-- .fluid_container -->   

</div>

<!-- <div class="img-servicios">
		<img src="/imgs/historias-recuperadas/dracula.jpg" class="img-responsive" 'Drácula' aling="left">
	</div> -->

	

	<p>La Revolución Mexicana es uno de los acontecimientos más importantes en la historia de México, es por ello que grandes personajes de la cinematografía nacional utilizaron el evento como inspiración para crear sus obras. La Filmoteca de la UNAM alberga un archivo único en el país dentro del cual existe una colección que describe a través de imágenes y secuencias la Revolución Mexicana y su impacto. Asimismo cuenta con una serie de cintas que entremezclan la ficción y la realidad para recrear este importante momento de la historia del país, entre ellas las cintas de directores como: Fernando de Fuentes, Miguel Contreras Torres, Emilio Fernández, Ismael Rodríguez, Roberto Gavaldón, entre otros. 
    </p>
    <p>Esta exposición consta de 20 carteles y 8 composiciones fotográficas de importantes filmes, que originalmente fueron  montados en bastidores con acrílicos o vidrio, de 60 x 90 cm., cuyos originales se encuentran en el Centro de Documentación de la Filmoteca de la UNAM. Mostrar este material al público, además de conservarlo,  es un deber hacia la sociedad. </p>

    <p>Entre los títulos presentados se encuentran: <strong><em>¡Vámonos con Pancho Villa!, Enamorada, Las abandonadas, La sombra de Pancho Villa / Revolución, El automóvil gris</em></strong>…</p>




@stop