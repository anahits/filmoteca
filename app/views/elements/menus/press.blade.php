
<?php 
$menu = array(
	array('Prensa', '/press_register'),

	array('Exposiciones', '/pages/press/exposiciones-museografia', array(
		array('Exposiciones realizadas', '/pages/press/exposiciones-realizadas')
		)),

	array('Publicaciones','/pages/press/publicaciones', array ( 
		/*array('Libros y revistas', '/pages/press/publicaciones'),*/ 
		array('Libros digitales', '/pages/press/libros-digitales'),
		array('Artículos', '/pages/press/publicaciones'))),
	
	array('Noticias', '/news/index'),

	array('Filmoteca en los medios', '/pages/press/filmoteca-in-the-media'),

	/*array('Galería', '/pages/press/gallery'),*/

	array('La Filmoteca recomienda', '/pages/press/interviews'),

	);

?>

@include('elements.menus.static-pages', compact('menu','selected'))
