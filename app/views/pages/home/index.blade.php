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
				@include('pages.home.partials.documentation-center')
			</div>
			<div class="col-xs-12 col-sm-6">
				@include('pages.home.partials.expositions')
			</div>
		</div>

		<div class="col-sm-12 col-md-12">
			@include('pages.home.partials.recommendations')
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="well well-sm">
					<h4 class="text-center"><a href="/pages/libreria/proximamente-venta-linea" title="Próximamente Tienda en línea">Próximamente Tienda en línea</a></h4>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<a href="http://online.fliphtml5.com/bsrf/xwtv/" title="Catálogo" target="_blank">
                  	<img src="/imgs/libreria/banner-catalogo.jpg" alt="Catálogo" class="img-responsive">
                </a>
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
	<a href="https://twitter.com/ButacaUNAM" title="Twitter ButacaUNAM"><span class="icon-twitter"></span></a>
	<a href="https://www.facebook.com/FilmotecaUNAM" title="Facebook FilmotecaUNAM" target="blank"><span class="icon-facebook"></span></a>
	<a href="https://www.youtube.com/user/FilmotecaUNAM" title="Youtube FilmotecaUNAM" target="blank"><span class="icon-youtube"></span></a>
	<a href="http://vimeo.com/filmotecaunam/videos" title="Vimeo FilmotecaUNAM" target="blank"><span class="icon-vimeo"></span></a>
	<a href="https://plus.google.com/117296642645060485198/posts" title="Google FilmotecaUNAM" target="blank"><span class="icon-google-plus"></span></a>
</div>

<div title="Arriba" class="ceil-toolbar toolbar-fixed visible-lg">
	<div class="text-center"><a class="icon-arrow-above" href="#main-header"></a></div>
	<span>arriba</span>
</div>

@stop