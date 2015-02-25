@extends('layouts.home')

@section('scripts')
	{{ HTML::script('/assets/js/home.js')}}
	{{ HTML::script('/assets/js/facebook.js')}}
	{{ HTML::script('/assets/js/twitter.js')}}
@stop

@section('content')

<div class="row">

	<div class="col-sm-12">
		@include('pages.home.partials.carousel')
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-4">
		@include('pages.home.partials.the-last')
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4">
		@include('pages.home.partials.filmoteca-invite')
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4">
		<div class="row">
			<div class="col-sm-6 col-md-12">
				@include('pages.home.partials.programming')
			</div>
			<div class="col-sm-6 visible-sm">
				@include('pages.home.partials.other-news')
			</div>
			<div class="col-sm-6 visible-sm">
				@include('pages.home.partials.visit')
			</div>
		</div>
	</div>
</div>

<div class="row hidden-sm">
	<div class="col-sm-12 col-md-4">
		@include('pages.home.partials.other-news')
	</div>
	<div class="col-sm-12 col-md-8">
		@include('pages.home.partials.visit')
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="flm-section expositions">
					<div class="content">
						<div class="header">
							<h4>Centro de documentación</h4><span>Abierto al público en general</span><br>
							<span class="see-more"><a href="/pages/servicios/centro-de-documentacion">Ver más</a></span>
						</div>
						<div class="image">
							<img src="/imgs/home/centro-documentacion.jpg" alt="Centro de Documentación Filmoteca UNAM" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="flm-section expositions">
					<div class="content">
						<div class="header">
							<h4>Exposiciones</h4>
							<h5>Cine surealismo</h5>
							<span>Sede: Filmoteca UNAM</span><br><span class="see-more"><a href="/pages/press/exposiciones-museografia">Ver más</a></span>
						</div>
						<div class="image">
							<img src="/imgs/home/exposiciones.jpg">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-12">
			@include('pages.home.partials.recommendations')
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="well well-sm">
					<h4 class="text-center"><a href="http://cineunam.librosdelau.com/">Tienda en línea</a></h4>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="well well-sm">
					<h4 class="text-center"><a href="http://www.libros.unam.mx/">Libros UNAM</a></h4>
				</div>
			</div>
		</div>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-4">
		@include('pages.home.partials.social-networks')
	</div>
</div>

<div class="row">
	@include('pages.home.partials.friend-sites')
</div>


<div class="toolbar-fixed social-networks-toolbar visible-lg">
	<a href="https://twitter.com/ButacaUNAM"><span class="icon-twitter"></span></a>
	<a href="https://www.facebook.com/FilmotecaUNAM" target="blank"><span class="icon-facebook"></span></a>
	<a href="https://www.youtube.com/user/FilmotecaUNAM" target="blank"><span class="icon-youtube"></span></a>
	<a href="http://vimeo.com/filmotecaunam/videos" target="blank"><span class="icon-vimeo"></span></a>
	<a href="https://plus.google.com/117296642645060485198/posts" target="blank"><span class="icon-google-plus"></span></a>
</div>

<div class="ceil-toolbar toolbar-fixed visible-lg">
	<div class="text-center"><a class="icon-arrow-above" href="#main-header"></a></div>
	<span>arriba</span>
</div>

@stop