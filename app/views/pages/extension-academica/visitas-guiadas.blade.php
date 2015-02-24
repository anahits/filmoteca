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
  <a href="/pages/extencion-academica/index">
    Extensión Academica
  </a>
</li>
<li class="active">
  Visitas guiadas
</li>
@stop




@section('sidebar')
   @include('elements.menus.extension-academica', array('selected' => 3))
@stop




@section('content')

  <h1>Visitas guiadas </h1>

  <div id="back_to_camera">

  </div><!-- #back_to_camera -->

  <div class="fluid_container">

    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
      <div data-thumb="/imgs/visitas-guiadas/thumbs/visitas1.jpg" data-src="/imgs/visitas-guiadas/visitas1.jpg">
        <div class="camera_caption fadeFromBottom">
         Conoce la Filmoteca de la UNAM
       </div>
     </div>
     <div data-thumb="/imgs/visitas-guiadas/thumbs/visitas2.jpg" data-src="/imgs/visitas-guiadas/visitas2.jpg">
      <div class="camera_caption fadeFromBottom">
        Bóvedas
      </div>
    </div>
    <div data-thumb="/imgs/visitas-guiadas/thumbs/visitas3.jpg" data-src="/imgs/visitas-guiadas/visitas3.jpg">
      <div class="camera_caption fadeFromBottom">
        <em>Taller de restauración</em> 
      </div>
    </div>
    <div data-thumb="/imgs/visitas-guiadas/thumbs/visitas4.jpg" data-src="/imgs/visitas-guiadas/visitas4.jpg">
      <div class="camera_caption fadeFromBottom">
        Laboratorio
      </div>
    </div>
    <div data-thumb="/imgs/visitas-guiadas/thumbs/visitas5.jpg" data-src="/imgs/visitas-guiadas/visitas5.jpg">
      <div class="camera_caption fadeFromBottom">
        Taller de restauración
      </div>
    </div>
    <div data-thumb="/imgs/visitas-guiadas/thumbs/visitas6.jpg" data-src="/imgs/visitas-guiadas/visitas6.jpg">
      <div class="camera_caption fadeFromBottom">
        Laboratorio
      </div>
    </div>
  </div><!-- #camera_wrap_1 -->

</div><!-- .fluid_container -->  

<h3>Visita la Filmoteca de la UNAM</h3>
<p>Para acercar a la comunidad estudiantil a conocer el trabajo que desempeña la Filmoteca de la UNAM se ofrecen visitas guiadas a sus diversas áreas, por ejemplo el área de restauración, donde los alumnos podrán observar los procesos a los que son sometidos los materiales fílmicos para su restauración y mantenimiento.</p>
<p>Tambien tendrán la oportunidad de conocer:</p>
<ul>
  <li>Qué es una película</li>
  <li>Procesos de restauración</li> 
  <li>Taller de restauración y clasificación técnica</li>
  <li>Muestra de restauración óptica</li>
  <li>Laboratorio de restauración óptica</li>
  <li>Material de archivo permanente</li>
  <li>Material de exhibición</li>
  <li>Recorrido de una película en nuestro archivo (bóvedas)</li>
</ul>

<p>Las visitas se realizan cada mes y medio con un cupo de máximo 20 alumnos por grupo y hasta dos profesores y/o responsables del área cultural del plantel.</p>

<p>Contacto: Nadina Illescas</p>
<p>Teléfono: 5622 9589</p>
<p>Correo electrónico: <a href="mailto:nadina1020@gmail.com">nadina1020@gmail.com </a></p>

</div>
@stop