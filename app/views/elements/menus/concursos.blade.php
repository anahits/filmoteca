<?php 

/*$menu = array(
	0 => array('Cursos y Talleres','/pages/cursos_talleres', array(
		'Procedimiento de inscripción', '/pages/procedimientos_inscripcion_cursos'), array(
		'Formulario de Registro', 'plugin' => 'courses', 'controller' => 'students', 'action' => 'register')),
	1 => array('Atención a alumnos', '/pages', array(
		'Servicio Social', '/pages/servicio_social'), array(
		'Becarios', '/pages/becarios')),
	2 => array('Visitas guiadas', '/pages/visitas_guiadas')
	);*/


$menu = array(

	array('José Rovirosa', '/pages/concursos/jose-rovirosa'),

	array('Alfonso Reyes "Fósforo"', '/pages/concursos/alfonso-reyes'),

	array('Corto móvil', '/pages/concursos/corto-movil'),

	array('Bienal de Tesis', '/pages/concursos/bienal-tesis'),

	array('Capturando el deporte', '/pages/concursos/capturando-deporte'),

	array('Convocatorias', '/pages/concursos/convocatorias'));

?>

<!-- ?> -->

@include('elements.menus.static-pages', compact('menu','selected'))