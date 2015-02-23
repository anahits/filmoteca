<?php
$menu = array(

	array('Programación', '/exhibition'),

	array('Cartelera', '/pages/programacion/cartelera-digital'),

	array('Invitaciones', '/pages/programacion/invitaciones'),

	array('Histórico', '/exhibition/history')

	);
?>

@include('elements.menus.static-pages', compact('menu','selected'))


