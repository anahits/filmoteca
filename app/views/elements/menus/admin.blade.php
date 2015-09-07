
<div class="btn-group">
	
	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Programación
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				{{ HTML::link('/admin/exhibition/app#/exhibitions', 'Ver toda la programación') }}
			</li>
			<li>
				{{ HTML::link('/admin/exhibition/app#/exhibitions/create', 'Agregar exhibiciones') }}
			</li>
			<li>
				{{ HTML::link('/admin/exhibition/app#/films', 'Ver todas las películas') }}
			</li>
			<li>
				{{ HTML::link('/admin/exhibition/app#/films/create', 'Agregar película') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.auditorium.index', 'Ver todas las salas') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.auditorium.create', 'Agregar salas') }}
			</li>
            <li>
                {{ HTML::link('/admin/exhibition/app#/iconographics', 'Iconos') }}
            </li>
		</ul>
	</div>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Medalla Filmoteca
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				{{ HTML::linkRoute('admin.filmotecaMedal.index', 'Ver todos los ganadores') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.filmotecaMedal.create', 'Agregar ganador') }}
			</li>
		</ul>
	</div>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Noticias
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				{{ HTML::linkRoute('admin.news.index', 'Ver todas las noticias') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.news.create', 'Agregar noticia') }}
			</li>
		</ul>
	</div>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Cartelera Digital
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				{{ HTML::linkRoute('admin.billboard.index', 'Ver todas las carteleras') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.billboard.create', 'Agregar cartelera') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.billboard.send', 'Enviar ultima cartelera') }}
			</li>
		</ul>
	</div>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Catálogo de la Tienda
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				{{ HTML::linkRoute('admin.catalog.index', 'Ver historial de catálogos') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.catalog.create', 'Agregar catálogo') }}
			</li>
		</ul>
	</div>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Entrevistas
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				{{ HTML::linkRoute('admin.interview.index', 'Ver lista de entrevistas') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.interview.create', 'Agregar entrevista') }}
			</li>
		</ul>
	</div>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Prensa
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				{{ HTML::linkRoute('admin.press_register.index', 'Ver registros') }}
			</li>
			<li>
				{{ HTML::linkRoute('press_register.create', 'Agregar registro') }}
			</li>
		</ul>
	</div>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Cronología
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				{{ HTML::linkRoute('admin.chronology.index', 'Ver cronología') }}
			</li>
			<li>
				{{ HTML::linkRoute('admin.chronology.create', 'Agregar cronología') }}
			</li>
		</ul>
	</div>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Cursos
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				<a href="/admin/professor/create">Agregar profesor</a>
			</li>
			<li>
				<a href="/admin/subject/create">Agregar asignatura</a>
			</li>
			<li>
				<a href="/admin/venue/create">Agregar sede</a>
			</li>
			<li>
				<a href="/admin/course/create">Agregar curso</a>
			</li>
			<li>
				<a href="/admin/professor">Lista de profesores</a>
			</li>
			<li>
				<a href="/admin/subject">Lista de asignaturas</a>
			</li>
			<li>
				<a href="/admin/venue">Lista de sedes</a>
			</li>
			<li>
				<a href="/admin/course">Lista de cursos</a>
			</li>
		</ul>
	</div>

    <a href="/admin/cms" class="btn btn-default">CMS</a>
</div>