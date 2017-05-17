<?php

/**
 * Recibe un array de links hacia scripts.
 * Cada entrada puede ser o una url hacia el script
 * o un array cuya primer entrada es un link y cuya
 * segunda entrada es una lista de atributos.
 * @var array
 */
HTML::macro('scripts', function($scripts = array()){

	return HTML::resource('script', $scripts);

});

HTML::macro('styles', function($styles = array())
{
	return HTML::resource('style', $styles);
});

HTML::macro('resource', function($type, $list = array())
{
	if( $type != 'script' && $type != 'style') return '';

	$html = '';

	foreach($list as $element)
	{
		if( is_string($element))
		{
			$html .= HTML::{$type}( $element );
		}else{

			if (!isset($element[1]))
			{
				$element[1] = array();
			}

			$html .= HTML::{$type}( $element[0], $element[1]);
		}
	}

	return $html;
});

HTML::macro('metatags', function( $metas )
{
	return '';
});

HTML::macro(
	'schedulesTimeAsList',
	function (\Filmoteca\Exhibition\Type\ScheduleCollection $schedules, $format = 'H:i') {

		$times = array_map(function (\Filmoteca\Exhibition\Type\Schedule $schedule) use ($format) {

			return '<span>' . $schedule->getEntry()->format($format) . '</span>';
		}, $schedules->all());

		return implode(' / ', $times);
	}
);

HTML::macro('technicalCard', function (\Filmoteca\Exhibition\Type\Film $film) {
	
	$tc = [];
	$technicalCard = '';

	$tc['original_title'] = $film->getOriginalTile();
	$tc['years'] = implode(', ', $film->getYears());
	$tc['countries'] = $film->getCountries()->implode('name', ', ');
	$tc['duration'] = $film->getDuration() . ' min.';
	$tc['genre'] = isset($film->genre)? $film->genre->name: '';
	$tc['director'] = $film->getDirector();
	$tc['script'] = $film->getScript();
	$tc['photographic'] = $film->getPhotographic();
	$tc['music'] = $film->getMusic();
	$tc['edition'] = $film->getEdition();
	$tc['production'] = $film->getProduction();
	$tc['cast'] = $film->getCast();

	foreach ($tc as $fieldName => $value) {
		if (!empty($value)) {
			$technicalCard .=
				'<p class= "margin">'.
					'<strong>'. Lang::get('exhibitions.frontend.film.show.fields.' . $fieldName) .
					'</strong>: ' . $value .
				' </p>';
		}
	}

	return $technicalCard;
});

HTML::macro('summaryTechnicalCard', function (\Filmoteca\Exhibition\Type\Film $film) {

	$summaryTechnicalCard =
		
		$pais = $film->getCountries()->implode('name', ', ');
		$año = implode(', ', $film->getYears());
		$duracion = $film->getDuration();
		$paisaño = "$pais" . "$año"; 

		{if (empty($año))
			{
				echo $pais;
			}
			else
			{
				echo $pais;
			}}
		{if (empty($pais))
			{
				echo $año;
			}
			elseif (empty($año))
			{
				echo $año;
			}
			else
			{
				echo ' / '.$año;
			}}
		{if (empty($paisaño))
			{
				echo $duracion.' min.';
			}
			else
			{
				echo ' / '.$duracion.' min.';
			}}

});
