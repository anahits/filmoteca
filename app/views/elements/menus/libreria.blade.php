<?php 


$menu = array(

	array('Puntos de venta', '/pages/libreria/libreria'),

	array('Tienda en línea', '/pages/libreria/proximamente-venta-linea'),

	array('Catálogo', '/pages/libreria/catalogo'));

?>

@include('elements.menus.static-pages', compact('menu','selected'))