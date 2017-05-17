<?php
$menu = array(

	array('Fílmico', '/pages/acervo/filmico'),

	array('Aparatos antiguos', '/pages/acervo/aparatos-antiguos'),

	array('Biblioteca', '/pages/acervo/biblioteca', array(
		array('Colecciones', '/pages/acervo/colecciones'))),

	array('Restauración', '/pages/acervo/restauracion', array(
		array('Historias recuperadas', '/pages/acervo/historias-recuperadas'))),

	array('Museo virtual', '/pages/acervo/museo-virtual'),

	array('Cine en línea', '/pages/acervo/cine-en-linea'));
?>

@include('elements.menus.static-pages', compact('menu','selected'))
