@extends('layouts.default')

@section('breadcrumbs')
<li>
	<a>
		Difusión
	</a>
</li>
<li class="active">
	Filmoteca en los Medios
@stop

@section('sidebar')
	@include('elements.menus.press', array('selected' => 4))
@stop

@section('content')


	<div class="panel-heading">
		<h2>Filmoteca en los Medios</h2>
	</div>
	
	<div class="panel-body">
		<p></p>

		<ul>
			<li>
				<a href="http://reporte24.mx/2015/01/filmoteca-unam-prepara-muestra-de-cine-en-nitrato/" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550, scrollbars=yes,resizable=yes'); return false;">Filmoteca UNAM prepara muestra de cine en nitrato</a>
			</li>
			<li>
				<a href="http://www.sdpnoticias.com/estilo-de-vida/2015/01/23/filmoteca-unam-prepara-el-festejo-de-sus-55-anos" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550, scrollbars=yes,resizable=yes'); return false;">Filmoteca UNAM prepara el festejo de sus 55 años</a>
			</li>
			<li>
				<a href="http://www.sinembargo.mx/23-01-2015/1227843" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550, scrollbars=yes,resizable=yes'); return false;">Filmoteca de la UNAM celebrará 55 años con muestra de cine en nitrato</a>
			</li>
			<li>
				<a href="http://www.eluniversal.com.mx/espectaculos/2015/filmoteca-unam-55-aniversario-1071302.html" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550, scrollbars=yes,resizable=yes'); return false;">Filmoteca UNAM prepara muestra de cine en nitrato</a>
			</li>
			<li>
				<a href="http://eldiariodevictoria.com.mx/2015/01/23/que-viva-mexico-se-presenta-musicalizada-en-el-fic-san-cristobal/" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550, scrollbars=yes,resizable=yes'); return false;">“Qué viva México!” se presenta musicalizada en el FIC San Cristóbal</a>
			</li>
			<li>
				<a href="http://www.sdpnoticias.com/local/chiapas/2015/01/22/terminan-actividades-del-festival-internacional-de-cine-de-san-cristobal-de-las-casas" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550, scrollbars=yes,resizable=yes'); return false;">Terminan actividades del Festival Internacional de Cine de San Cristóbal de las Casas</a>
			</li>
			<li>
				<a href="http://derutapormexico.blogspot.mx/2015/01/programacion-filmoteca-de-la-unam-2015.html" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550, scrollbars=yes,resizable=yes'); return false;">Programación Filmoteca de la UNAM 2015</a>
			</li>
			<li>
				<a href="http://www.entornointeligente.com/articulo/4724578/Revueltas-parte-de-la-programacioacute;n-de-la-Filmoteca-Unam" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550, scrollbars=yes,resizable=yes'); return false;">Revueltas, parte de la programación de la Filmoteca UNAM</a>
			</li>
			<li>
				<a href="http://www.poblanerias.com/2014/02/festival-ambulante-presentara-documental-redes-de-1936/" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550'); return false;">Festival Ambulante presentará documental “Redes”, de 1936</a>
			</li>
			<li>
				<a href="http://www.veracruzanos.info/con-la-mujer-del-puerto-la-amacc-inaugura-actividades-de-2014/" target="_blank" onclick="window.open(this.href, this.target, 'width=780,height=550'); return false;">Con "La mujer del puerto" la AMACC inaugura actividades de 2014</a>
			</li>
		</ul>

	</div>


@stop