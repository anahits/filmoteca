@extends('layouts.app')

@section('scripts')

  {{ HTML::script('/apps/require.config.js')}}

  {{ HTML::script(
    '/bower_components/requirejs/require.js', 
    ['data-main' =>'/apps/pages/courses/App.js'])
  }}
@stop

@section('styles')

@section('breadcrumbs')
<li>
  <a href="/pages/extension-academica/index">
    Extensión Academica
  </a>
</li>
<li class="active">
  Cursos y talleres
</li>
@stop


@section('sidebar')
	@include('elements.menus.extension-academica', array('selected' => 0))

    <!-- <div class="content">
            <div class="alert alert-dismissible ng-cloak" ng-class="'alert-' + messageType" ng-show="message">
              @{{message}}
              <button type="button" class="close" ng-click="closeAlert()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>             <div ng-view>
              <div class="loading" ng-show="loading"></div>
            </div>
    </div>-->


@stop


@section('content')


<h1>Cursos de la Filmoteca de la UNAM</h1>

<p>No te pierdas la oportunidad de inscribirte a los cursos que ofrece la Filmoteca UNAM para ti: </p>


	      <div class="col-xs-12 col-sm-12">

          <div class="row">

            <div class="col-6 col-sm-6 col-lg-6">
              <h5>SEMINARIO ESTÉTICA CINEMATOGRÁFICA CINE-MÁQUINA(S)</h5>
              <img src="/imgs/cursos/curso-cine-maquina.jpg" class="img-responsive" 'Seminario de estética cinematográfica cine máquina'></a>
              <p>El seminario pretende explorar las ideas-cine de Godard, Kluge, Tarr, Cronenberg, Herzog, Lynch y otros, conectando y tendiendo puentes  con algunos conceptos e ideas de la filosofía contemporánea...
              </p>
              <p>Impartido por: Dra. Sonia Rangel Espinosa</p>
              <p><strong>Del 2 de febrero al 27 de abril de 2015</strong></p>
              <p>Lunes de 17:00 a 20:00 hrs.</p>
              <p><a class="btn btn-default" href="/pages/cursos/cine-maquina" role="button">Ver temario »</a></p>
            </div><!--/span-->

            <div class="col-6 col-sm-6 col-lg-6">
              <h5>INTRODUCCION A LA HISTORIA DEL CINE MUNDIAL</h5>
              <img src="/imgs/cursos/cine-mundial.jpg" class="img-responsive" 'Introducción al historia del cine mundial'></a>
              <p>Programa en XII sesiones de 3 horas cada una, sobre los orígenes, corrientes, géneros, escuelas, exponentes y obras trascendentes que inducen al estudio del cine.</p>
              <p>Impartido por: Profesor y periodista César Aguilera</p>
              <p><strong>Inicia el 24 de febrero de 2015</strong></p>
              <p>Martes de 17:00 a 20:00 hrs.</p>
              <p><a class="btn btn-default" href="/pages/cursos/introduccion-historia-cine-mundial" role="button">Ver temario »</a></p>
            </div><!--/span-->

            <div class="col-6 col-sm-6 col-lg-6">
              <h5>LA MEMORIA. HISTORIA DEL DOCUMENTAL</h5>
              <img src="/imgs/cursos/historia-documental.jpg" class="img-responsive" 'La memoria. Historia del cine documental.'></a>
				      <p>Los objetivos de este curso es hacer un recorrido cronológico del documental desde sus inicios. Paralelamente conocer algunos de los distintos géneros que se han desarrollado, desde contenido antropológico, hasta algunos recientes de gran éxito en taquilla. 
			       </p>
              <p>Impartido por: Laura Martínez Díaz</p>
              <p><strong>Del 26 de febrero al 21 de mayo de 2015</strong></p>
              <p>Jueves de 17:00 a 20:00 hrs.</p>
              <p><a class="btn btn-default" href="/pages/cursos/cine-documental" role="button">Ver temario »</a></p>
            </div><!--/span-->

            <div class="col-6 col-sm-6 col-lg-6">
              <h5>LA MIRADA SINIESTRA: EL CINE SEGÚN  HITCHCOCK (un acercamiento vouyerista)</h5>
              <img src="/imgs/cursos/mirada-siniestra.jpg" class="img-responsive" 'La mirada siniestra: el cine según Hitchcock'></a>
              <p>Revisión histórica del legado e influencia de Alfred Hitchcock a través del análisis cinematográfico de sus más importantes obras,  y como  su particular visión del mundo, modificó para siempre el suspenso, el misterio, el terror, así como otros géneros cinematográficos. </p>
              <p>Impartido por: Juan Santiago Huerta Navarro</p>
              <p><strong>Del 27 de febrero al 22 de mayo de 2015</strong></p>
              <p>Viernes de 17:00 a 20:00 hrs.</p>
              <p><a class="btn btn-default" href="/pages/cursos/mirada-siniestra" role="button">Ver temario »</a></p>
            </div><!--/span-->
            
            <div class="col-6 col-sm-6 col-lg-6">
              <h5>SEMINARIO ORSON WELLES, MÁS ALLÁ DEL CIUDADANO KANE</h5>
              <img src="/imgs/cursos/orson-welles.jpg" class="img-responsive" 'Seminario Orson Welles, más allá del Ciudadano Kane'></a>
				      <p>Analizar, a través de 16 sesiones parte de la obra de quien es considerado uno de los artistas más versátiles del siglo XX en el campo del teatro, la radio y el cine, en los que tuvo excelentes resultados.
			       </p>
              <p>Impartido por: Francisco Ohem</p>
              <p><strong>Del 11 de marzo al 1 de junio de 2015</strong></p>
              <p>Miércoles de 17:00 a 20:00 hrs.</p>
              <p><a class="btn btn-default" href="/pages/cursos/seminario-orson-welles" role="button">Ver temario »</a></p>
            </div><!--/span-->

          </div><!--/row-->

        </div><!--/span-->
	

@stop