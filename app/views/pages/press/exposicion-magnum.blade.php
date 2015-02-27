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

    <h2>EL CINE FRANCÉS CON LOS FOTÓGRAFOS DE MAGNUM</h2>
    <br>
        <h5>Visita nuestras exposiciones - Filmoteca UNAM</h5>
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <div data-thumb="/imgs/exposiciones/magnum/thumbs/exposicion-magnum1.jpg" data-src="/imgs/exposiciones/magnum/exposicion-magnum1.jpg">
                <div class="camera_caption fadeFromBottom">
                    
                </div>
            </div>
            <div data-thumb="/imgs/exposiciones/magnum/thumbs/exposicion-magnum2.jpg" data-src="/imgs/exposiciones/magnum/exposicion-magnum2.jpg">
                <div class="camera_caption fadeFromBottom">
                    
                </div>
            </div>
            <div data-thumb="/imgs/exposiciones/magnum/thumbs/exposicion-magnum3.jpg" data-src="/imgs/exposiciones/magnum/exposicion-magnum3.jpg">
                <div class="camera_caption fadeFromBottom">
                    
                </div>
            </div>
            <div data-thumb="/imgs/exposiciones/magnum/thumbs/exposicion-magnum4.jpg" data-src="/imgs/exposiciones/magnum/exposicion-magnum4.jpg">
                <div class="camera_caption fadeFromBottom">
                    
                </div>
            </div>
            
            
        </div><!-- #camera_wrap_1 -->

    </div><!-- .fluid_container -->   

</div>

<!-- <div class="img-servicios">
		<img src="/imgs/historias-recuperadas/dracula.jpg" class="img-responsive" 'Drácula' aling="left">
	</div> -->

	

	<p>Fundada en París el 22 de mayo de 1947 por los célebres fotógrafos Henri Cartier-Bresson, Robert Capa, David Seymour y George Rodger, la agencia Magnum fue creada como una cooperativa, con el propósito de proteger los derechos de los fotógrafos sobre sus obras y darles independencia económica y libertad de creación, sin ningún tipo de censura. Abierta a todas las nacionalidades y a todas las tendencias, al año siguiente de su fundación instalaba también un despacho en Nueva York, realizando foto-reportajes en todo el mundo.<p>

	<p>Actualmente la agencia cuenta además con oficinas en Londres y Japón. Entre Magnum y el cine se establece una vigorosa relación que tiene como centro el Hollywood de finales de los cuarenta y los cincuenta, hasta el gran éxito de la televisión, que empieza en esos años a sustituir a las revistas como el medio ideal para la promoción de las películas. Entonces es Europa, en particular en el seno de la Nueva ola francesa, donde los fotógrafos de Magnum tienen la oportunidad de mantenerse ligados a este campo durante algunos años más. La agresividad de nuevas agencias especializadas en la cinefotografía, que exigen exclusividad durante el tiempo de rodaje, contrasta con la independencia de Magnum y la libertad de elección para el fotógrafo, lo que hace que cada vez tenga más dificultad para trabajar en el cine. Raymond Depardon, Wayne Miller, Guy Le Querrec, Philippe Halsman, Patrick Zachmann, Martine Franck Dennis Stock, Gilles Peress, Eve Arnold, Elliott Erwitt, Erich Hartmann, Marc Riboud, Ferdinando Scianna, Sebastião Salgado y Steve McCurry son sólo algunos de los fotógrafos de la agencia que han documentado importantes aspectos de la vida moderna a través de sus lentes. La excelencia alcanzada por los integrantes de Magnum ha tenido una extraordinaria influencia en la historia de la fotografía y del periodismo gráfico.</p>

	<p>Este año la Filmoteca de la UNAM conmemora el 10º aniversario luctuoso de Henri Cartier-Bresson (1908-2004) con la presente exposición que exhibe un amplio panorama de la cinematografía francesa plasmado por los fotógrafos de la Agencia Magnum, con la presencia de las figuras fundamentales en el desarrollo de esta industria fílmica, una de las más importantes a nivel mundial. Realizadores y actores de distintas épocas figuran en la muestra, con un énfasis particular en los creadores y personajes del movimiento Nouvelle vague (nueva ola).</p>

	<p>La exposición consta de 20 reproducciones de carteles, originalmente montados en bastidores con acrílicos, de 60 x 90 cm. Todo el material está digitalizado para ofrecerlo a sedes foráneas.</p>

	<p>Te invitamos a conocer, a través de nuestra página web www.filmoteca.unam.mx, el resto de las actividades de extensión académica que realiza la Filmoteca de la UNAM, o visita directamente nuestras instalaciones en Circuito Maestro Mario de la Cueva s/n, frente a la Facultad de Ciencias Políticas y Sociales, en Ciudad Universitaria.</p>

	


 






@stop