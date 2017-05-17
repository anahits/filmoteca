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

	array('Cursos y Talleres', '/pages/cursos/cursos-y-talleres',
	 array(
		array('Cursos anteriores', '/pages/cursos/cursos-anteriores'),
		array ('Procedimiento de Inscripción', '/pages/cursos/procedimiento-de-inscripcion')
		)),

	array('Servicio social', '/pages/extension-academica/servicio-social'),

	array('Becarios', '/pages/extension-academica/becarios',
	 array(
		array('Convocatoria', '/pages/extension-academica/convocatoria-becarios')
		)),

	array('Programa leer cine', '/pages/programa-leer-cine/programa-leer-cine'),

	array('Visitas guiadas', '/pages/extension-academica/visitas-guiadas'));
?>

<!-- ?> -->

@include('elements.menus.static-pages', compact('menu','selected'))