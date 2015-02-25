@extends('layouts.default')

@section('breadcrumbs')
<li>
	<a>
		Difusión
	</a>
</li>
<li class="active">
	La Filmoteca recomienda
@stop

@section('sidebar')
	@include('elements.menus.press', array('selected' => 5))
@stop

@section('content')


	<div class="panel-heading">
		<h2>La Filmoteca recomienda:</h2>
		
	</div>
	
	<div class="panel-body">
		<p>La Filmoteca y Francisco Ohem te hacen las siguientes recomendaciones de películas:</p>

		
		<div class="video-preview">
	
		<!-- 	<div>
			<p>Francisco Ohem recomienda la película: <em>Alas (Wings)</em>.</p>
			<iframe width="260" height="215" src="//www.youtube-nocookie.com/embed/-fzR8VpIXb8" frameborder="0" allowfullscreen>Francisco Ohem recomienda la película: <em>Alas (Wings)</em>. </iframe>					
			</div>
			<div>
			<p>Francisco Ohem recomienda la película: <em>La batalla del Somme</em>.</p>
			<iframe width="260" height="215" src="//www.youtube-nocookie.com/embed/u-n3pMpUPj4" frameborder="0" allowfullscreen>Francisco Ohem recomienda <em>La batalla del Somme</em></iframe>					
			</div> -->
		</div>
	</div>
		

		<div class="col-xs-12 col-sm-12">

           <div class="row">

            <div class="col-6 col-sm-6 col-lg-6">
              <h4>Película: <span>Alas (Wings)</span>.</h4>
			<iframe width="260" height="215" src="//www.youtube-nocookie.com/embed/-fzR8VpIXb8" frameborder="0" allowfullscreen>Francisco Ohem recomienda la película: <em>Alas (Wings)</em>. </iframe>	
            </div><!--/span-->
            
            <div class="col-6 col-sm-6 col-lg-6">
              <h4>Película: <span>La batalla del Somme</span>.</h4>
			<iframe width="260" height="215" src="//www.youtube-nocookie.com/embed/u-n3pMpUPj4" frameborder="0" allowfullscreen>Francisco Ohem recomienda <em>La batalla del Somme</em></iframe>
            </div><!--/span-->
            

          </div><!--/row-->
        </div><!--/span-->	

@stop