<header class="main-header" id="main-header">
	<div class="upper-navbar">
		<div class="searchmenucontent">
			<div class="text-right col-xs-6 col-sm-6 col-md-8 col-lg-10">
				<a href="/" title="Inicio">
					<span class="icon-home"></span>Inicio
				</a>
				<a href="/pages/quienes-somos/directorio" title="Directorio">Directorio</a>
				<a href="/pages/home/mapa-del-sitio" title="Mapa del sitio">Mapa del sitio</a>
				<a href="{{ URL::to('contact') }}" title="Contacto">Contacto</a>
				<!-- SiteSearch Google -->
			</div>
			<div class="text-right col-xs-3 col-sm-3 col-md-4 col-lg-2">
				<form class="home-search" method=GET action="http://www.google.com/search">
					<a href="http://www.google.com/"></a>
				        <div class="input-group home-search">
				            <div class="input-group-addon">
				                <span class="glyphicon glyphicon-search"></span>
				            </div>
				            <input type="text"
				                   class="form-control"
				                   id="films-searcher"
				                   name="q"
				                   size=31 
				                   maxlength=255 
				                   value=""
				                   placeholder="Buscar en sitio">
				        </div>
					<input type=hidden name=domains value="http://www.filmoteca.unam.mx">
					<input type=hidden name=sitesearch value="http://www.filmoteca.unam.mx" checked>
				</form>
			</div>
				<!-- SiteSearch Google -->

				<!--<a href="#"><span class="icon-accessibility"></span></a>-->
		</div>
	</div>

	<div class="strip">
		<div>
			<div class="pull-left sm-logo-unam">
				<div class="pull-left">
					<a href="http://www.cultura.unam.mx/index.aspx" title="Cultura UNAM" target="blank">
						<img src="/assets/imgs/imagotipo_culturaUNAM.png" alt="Cultura UNAM">
					</a>
				</div>
			</div>
			<div class="pull-right sm-logo-filmo">
				<div class="filmoteca-text pull-left text-right hidden-xs">
					<span>Dirección General de</span><br>
					<span>Actividades Cinematográficas</span>
				</div>
				<div class="pull-left">
					<a href="/" title="Filmoteca UNAM">
						<img src="/assets/imgs/filmoteca.png" alt="logo Filmoteca UNAM">
					</a>
				</div>
			</div>
		</div>
	</div>

	<nav>
		@include('elements.menus.main')
	</nav>

</header>

<div class="toolbar">

	<div>

		@if( !isset($not_breadcrumbs) )
			<ul class="breadcrumb">
				<li><span class="icon-home"></span>{{ HTML::linkRoute('home',' Inicio') }}</li>
				@yield('breadcrumbs')
			</ul>
		@endif


	</div>

</div>
