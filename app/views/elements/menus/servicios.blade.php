<?php

$menu = array(

	array('Banco de imagen', '/pages/servicios/banco-de-imagen'),

	array('Catalogación', '/pages/servicios/departamento-de-catalogacion'),

	array('Centro de documentación', '/pages/servicios/centro-de-documentacion'),

	array('Depósito y resguardo', '/pages/servicios/deposito-y-resguardo'),

	array('Laboratorio cinematográfico', '/pages/servicios/laboratorio-cinematografico'),

	array('Laboratorio digital', '/pages/servicios/laboratorio-digital'),

	array('Préstamo y alquiler de películas', '/pages/servicios/prestamo-y-alquiler-de-peliculas'),

	array('Producción', '/pages/servicios/departamento-de-produccion'),

	array('Taller de restauración', '/pages/servicios/taller-de-restauracion'),

	array('Requisitos para solicitar un servicio', '/pages/servicios/requisitos-para-solicitar-un-servicio')

	);
?>

@include('elements.menus.static-pages', compact('menu','selected'))