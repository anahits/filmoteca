@section('scripts')
{{ HTML::scripts(array(
	'/bower_components/jqueryui/ui/minified/jquery.ui.core.min.js',
	'/bower_components/jqueryui/ui/minified/jquery.ui.widget.min.js',
	'/bower_components/jqueryui/ui/minified/jquery.ui.accordion.min.js',
	'/assets/js/static-pages/directorio.js')) }}
@stop

@section('styles')
{{ HTML::styles(array(
	'/bower_components/jqueryui/themes/smoothness/jquery-ui.css',
	'/bower_components/jqueryui/themes/smoothness/jquery.ui.theme.css')) }}
@stop


@section('breadcrumbs')
<li>
	<a href="/pages/extencion-academica/index">
		Extensión Academica
	</a>
</li>
<li class="active">
	Servicio Social
</li>
@stop



@section('sidebar')
	@include('elements.menus.extension-academica', array('selected' => 1))
@stop



@section('content')

	<h1>Servicio Social</h1>

	<p>En su afán de contribuir al enriquecimiento del mundo cinematográfico y al mismo tiempo ayudar a los miembros de la población estudiantil a poner en práctica los conocimientos obtenidos durante la carrera, la Filmoteca de la UNAM pone a disposición de la comunidad estudiantil el  programa de servicio social, abierto a distintas áreas del conocimiento.</p>
	<p>Si deseas ser parte del programa de Servicio Social de la Filmoteca de la UNAM debes contar con un 70% de créditos cubiertos, historial académico que ratifique la información e identificación oficial.</p>
	<p>Comunicarte con la maestra Nadina Illescas Villegas al teléfono 5622-9589 y 5622-9595, o al correo electrónico <a href="mailto:nadina1020@gmail.com">nadina1020@gmail.com</a> para pedir una cita o ampliar la información.</p>
	<br>
	<p>Estas son las diferentes áreas en las que puedes participar:</p>

<ul>
	<div class="informacion">
	
		<div id="accordion-resizer" class="ui-widget-content">
			
			<div id="accordion">
				
				<h3>Artes Visuales</h3>
				<div>
					<ul>
						<li>Apoyo en la alimentación de aparatos pre cinematográficos y cinematográficos de la colección del acervo del museo virtual.</li> 
						<li>Apoyo en el diseño y composición visual de la página electrónica, edición y creación de imágenes.</li>
						<li>Elaboración de banners interactivos y retoque digital de imágenes.</li> 
						<li>Apoyo para la supervisión externa de transferencia de material cinematográfico.</li> 
						<li>Apoyo para la supervisión de imágenes en movimiento y fijas, para su difusión en la página de la filmoteca de la UNAM.</li>     
					</ul>
					<br>
				</div>
				<h3>Bibliotecología y estudios de la información</h3>
				<div>
					<ul>
						<li>Revisar y organizar la documentación referente al ingreso de material al acervo de la DGAC.</li> 
						<li>Clasificar la documentación al ingreso de material al acervo de la DGAC.</li> 
						<li>Diseñar para organizar la información con la finalidad de producir una base de datos.</li> 
						<li>Estudiar, analizar y proponer mejores metodologías y estrategias para bases de datos.</li> 
					</ul>
					<br>
				</div>
				<h3>Ciencias de la comunicación</h3>
				<div>
					<ul>
						<li>Realizar estudios de mercadotécnica para proponer estrategias para promover y difundir la programación.</li> 
						<li>Investigar información para la elaboración de fichas de películas.</li> 
						<li>Buscar y seleccionar materiales y fotografías en publicaciones especializadas.</li>
						<li>Investigar biografías de personalidades del ámbito cinematográfico.</li>
						<li>Apoyar la organización de actividades de difusión y prensa.</li>
					</ul>
					<br>
				</div>
				<h3>Composición</h3>
				<div>
					<ul>
						<li>Apoyo en la investigación para sincronización de imagen con partitura musical para la programación y exhibición de películas silentes del acervo de la filmoteca de la UNAM.</li> 
						<li>Apoyo para la identificación de material, sonoro en soporte analógico, utilizando en material cinematográfico, del acervo de material sonoro de filmoteca de la UNAM.</li> 
						<li>Apoyo para la obtención de fichas técnicas de material cinematográfico, del acervo de material sonoro de la filmoteca de la UNAM.</li> 
						<li>Apoyo en la depuración y catalogación de materiales sonoros del acervo de la filmoteca de la UNAM.</li> 
						<li>Apoyo para el análisis e identificación de materiales sonoros, en soporte analógico, para su documentación.</li>
					</ul>
					<br>
				</div>
				<h3>Derecho</h3>
				<div>
					<ul>
						<li>Indagar, proponer y resolver la situación legal de los materiales cinematográficos que se encuentran en la filmoteca de la UNAM.</li> 
						<li>Tramitar, conservar y continuar con los derechos de autor y patrimoniales de los materiales del acervo de la filmoteca.</li> 
						<li>Investigar y dar seguimiento a la situación legal de asuntos pendientes.</li> 
						<li>Dar seguimiento a convenios vigentes.</li> 
						<li>Dar seguimiento a contratos vigentes.</li>
					</ul>
					<br>
				</div>
				<h3>Historia</h3>
				<div>
					<ul>
						<li>Búsqueda de material cinematográfico en base de datos.</li> 
						<li>Atención a solicitudes de documentalistas.</li> 
						<li>Revisión de material cinematográfico en 16 y 35 mm.</li> 
						<li>Transferencia de imágenes a formatos digitales.</li> 
						<li>Catalogación de fichas técnicas.</li> 
						<li>Supervisión externa de transferencia de material.</li>
					</ul>
					<br>
				</div>
				<h3>Ingeniería en computación</h3>
				<div>
					<ul>
						<li>Desarrollar sistemas en java para aplicaciones y/o servicios web.</li> 
						<li>Desarrollar sistemas en SQL para aplicaciones y/o servicios web.</li>  
						<li>Ofrecer soporte técnico a usuarios de Windows red UNAM y sistemas propietarios de la filmoteca UNAM.</li>  
						<li>Desarrollar sistemas de computo orientadas a optimizar los trabajos de los usuarios en diferentes áreas.</li>  
						<li>Proponer y desarrollar iniciativas para el mejoramiento de los servicios de computo.</li> 
					</ul>
					<br>
				</div>
				<h3>Literatura dramática y teatro</h3>
				<div>
					<ul>
						<li>Investigación para sincronización de imagen con partitura musical para la programación y exhibición de películas silentes del acervo de la filmoteca de la UNAM.</li>  
						<li>Identificación de material sonoro, en soporte analógico, utilizado en material cinematográfico, del acervo de material sonoro de la filmoteca de la UNAM.</li>  
						<li>Obtención de fichas técnicas de materiales cinematográficos y sonoros del acervo sonoro de la filmoteca de la UNAM.</li>  
						<li>Depuración y catalogación de materiales cinematográficos y sonoros del acervo de la filmoteca de la UNAM.</li>  
						<li>Análisis e identificación de materiales sonoros, en soporte analógico, para su documentación.</li> 
					</ul>
					<br>
				</div>
				<h3>Matemáticas</h3>
				<div>
					<ul>
						<li>Apoyar en el desarrollo de algoritmos en javascript para soportar paginas web con animaciones (2d y 3d).</li>  
						<li>Apoyar en el desarrollo programas en javascript html5 para soportar paginas web con animaciones. En particular el nuevo desarrollo del museo virtual de aparatos cinematográficos.</li>  
						<li>Apoyar con metodologías de ingeniería de software los desarrollos de sistemas de información y paginas web.</li>  
						<li>Apoyar el análisis de requerimientos de sistemas de información propios de la dependencia.</li>  
						<li>Apoyar desarrollos y programación de sistemas de información propios de la dependencia.</li>  
						<li>Apoyo en la divulgación de la ciencia y la tecnología detrás de un aparato cinematográfico de museo.</li> 
					</ul>
					<br>
				</div>
				<h3>Sociología</h3>
				<div>
					<ul>
						<li>Apoyar con la elaboración de encuestas y/o estudios de mercado para conocer el perfil de los asistentes a las actividades programadas.</li>  
						<li>Apoyar en la elaboración de documentos que recopilen, organicen, tabulen y calculen la información estadística obtenida durante las actividades organizadas por la DGAC.</li>  
						<li>Apoyar en la elaboración de diseños de estrategias para el análisis de interacción entre los participantes de actividades específicas como la organización de festivales y muestras de cine con el fin de mejorar la estructura interna y flujo de información entre las áreas.</li>  
						<li>Apoyar en el diagnóstico de problemas y en consecuencia, proponer, diseñar y construir soluciones particulares y específicas a la organización de actividades de programación y difusión.</li>  
						<li>Revisión de material cinematográfico.</li>					
					</ul>
					<br>
				</div>
				<h3>Informática</h3>
				<div>
					<ul>
						<li>Desarrollar sistemas en java para aplicaciones y 7o servicios web.</li>  
						<li>Desarrollar sistemas en SQL para aplicaciones y 7o servicios web.</li> 
						<li>Asesorar a los diferentes usuarios de la filmoteca UNAM en los paquetes de uso común.</li>  
						<li>Coadyuvar a la administración de la red de cómputo de la dependencia.</li>  
						<li>Proponer y desarrollar iniciativas para el mejoramiento de los servicios de cómputo.</li> 		
					</ul>
					<br>
				</div>
				<h3>Educación musical</h3>
				<div>
					<ul>
						<li>Apoyo en la investigación para sincronización de imagen con partitura musical para la programación y exhibición de películas silentes del acervo de la filmoteca de la UNAM.</li>  
						<li>Apoyo para la identificación de material sonoro, en soporte analógico, utilizado en material cinematográfico, del acervo de material sonoro de la filmoteca de la UNAM.</li>  
						<li>Apoyo para la obtención de fichas técnicas de materiales cinematográficos y sonoros del acervo sonoro de la filmoteca de la UNAM.</li>  
						<li>Apoyo en la depuración y catalogación de materiales sonoros del acervo de la filmoteca de la UNAM.</li>  
						<li>Apoyo para el análisis e identificación de materiales sonoros, en soporte analógico, para su documentación.</li>
					</ul>
					<br>
				</div>
				<h3>Comunicación y periodismo</h3>
				<div>
					<ul>
						<li>Apoyar en la organización de actividades de difusión, prensa y medios electrónicos. 
						<li>Apoyar en la búsqueda y selección de materiales y fotografías en publicaciones especializadas.</li>  
						<li>Apoyar en la investigación de información cinematográfica para la elaboración de fichas técnicas de películas.</li>  
						<li>Apoyar en el diagnóstico de problemas y en consecuencia, proponer, diseñar y construir soluciones particulares y específicas a la organización de actividades de programación y difusión.</li> 
					</ul>
					<br>
				</div>
				<h3>Diseño y comunicación visual</h3>
				<div>
					<ul>
						<li>Diseñar y procesar materiales para la producción de impresos.</li>  
						<li>Diseñar y procesar información para difusión.</li>  
						<li>Realizar registro fotográfico de la colección de aparatos pre cinematográficos y cinematográficos.</li>  
						<li>Identificar técnicas de impresión de la colección de carteles y fotomontajes cinematográficos.</li>  
						<li>Identificar técnicas graficas de la colección de carteles y fotomontajes cinematográficos.</li> 
					</ul>
					<br>
				</div>
				<h3>Ingeniería mecánica</h3>
				<div>
					<ul>
						<li>Restaurar equipos cinematográficos.</li>  
						<li>Dar mantenimiento a los equipos cinematográficos en uso.</li>  
						<li>Revisar y reparar para su buen funcionamiento pegadoras de cemento y de cinta adhesiva.</li>  
						<li>Dar mantenimiento a sincronizadoras de 35 y 16 mm.</li>  
						<li>Dar servicio preventivo a enrolladoras, bobinas desarmables y moviolas mecánicas de 35 y 16 mm.</li> 
					</ul>
					<br>
				</div>
				<h3>Desarrollo y gestión interculturales</h3>
				<div>
					<ul>
						<li>Utilizar los mecanismos básicos de conservación de los legados culturales, documentales y audiovisuales para el patrimonio fílmico de la UNAM. 
						<li>Proponer estrategias y crear programas, cursos, exhibiciones fílmicas, realización de festivales, foros, conferencias y seminarios, para propiciar el enriquecimiento cultural.</li>  
						<li>Aprender a definir y examinar las implicaciones económicas de la cultura con el fin de impulsar el potencial de las tareas y servicios para generar recursos en relación con la gestión.</li>  
						<li>Entender los enfoques prácticos sobre el uso imágenes como medio de representación intercultural en sus aspectos sociales, históricos políticos, estéticos y técnicos.</li>  
						<li>Analizar criticas sobre el hecho cinematográfico en turno a la problemática social, política y cultural.</li> 
					</ul>
					<br>
				</div>


			</div>
		
		</div>	
	</div>
</ul>

</div>
@stop