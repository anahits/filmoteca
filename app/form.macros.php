<?php

Form::macro('formGroup', 
	function($type, $name, $title, $formname,array $attr = array())
{
	$CUSTOM_INPUTS = ['year', 'country', 'multiCountry', 'multiYear','genre',
	'textarea', 'auditorium', 'theMedia', 'professor', 'subject', 'venue',
	'date'];

	$attr['placeholder'] = $title;
	$attr['formname']	 = $formname;
	$attr['ng-model']	 = $formname . '.' .$name;

	if(array_search($type, $CUSTOM_INPUTS)){
		$type .= 'FormGroup';
		return Form::{$type}($name, $title, $formname, $attr);		
	}

	return "\n" .
	'<div class="form-group"' . "\n" .
	'	ng-class="{\'has-error\' : film_form.' . $name . '.$invalid }">' . "\n" .
	'	<label for="' . $name . '" class="col-sm-2 control-label text-right">' . $title . '</label>' . "\n" .
	'	<div class="col-sm-10">' . "\n" .

	Form::input($type, $name, null, $attr) .

	'	</div>' ."\n".
	'</div>' . "\n";
});

Form::macro('dateFormGroup', function($name,$title, $formname, $attr){

	return
	'<div class="form-group">' .
	'	<label for="' . $name . '" class="col-sm-2 control-label text-right">' . $title . '</label>' .
	'	<div class="col-sm-10">' .
	'		<div class="input-group date">' .
	'			<span class="input-group-addon btn"><i class="glyphicon glyphicon-th"></i></span>' .
				Form::input('text', $name, null, $attr) .
	'		</div>' .
	'	</div>' .
	'</div>';
});

Form::macro('multiYear', function($name, $title, $selected)
{
	$minYear = Config::get('parameters.admin.exhibition.film.min_year');

	$options = range($minYear, intval(date('Y') + 2));

	$attr = ['class' => 'multiyear', 'multiple' => 'multiple'];

	$input = Form::select($name, array_combine($options, $options), $selected, $attr);

	return Form::wrapperInput($name, $title, $input);
});

Form::macro('multiCountry', function($name, $title, $selected)
{
	$options = Filmoteca\Models\Country::all(['id', 'name'])->lists('name', 'id');

	$attr = ['class' => 'multicountry', 'multiple' => 'multiple'];

	$input = Form::select($name, $options, $selected, $attr);

	return Form::wrapperInput($name, $title, $input);
});

Form::macro('countryFormGroup', function($name, $title, $formname, $attributes)
{
	$options = DB::table('countries')->lists('name', 'id');

	return Form::selectFormGroup($name, $options,$title,$formname,$attributes);
});

Form::macro('genreFormGroup', function($name, $title, $formname, $attributes)
{
	$options = Filmoteca\Models\Genre::all(['id','name'])->lists('name','id');

	return Form::selectFormGroup($name, $options,$title,$formname,$attributes);
});

Form::macro('subjectFormGroup', function($name, $title, $formname, $attributes)
{
	$options = Filmoteca\Models\Courses\Subject::all(['id','name'])->lists('name','id');

	return Form::selectFormGroup($name, $options,$title,$formname,$attributes);
});

Form::macro('professorFormGroup', function($name, $title, $formname, $attributes)
{
	$options = Filmoteca\Models\Courses\Professor::all(['id','name'])->lists('name','id');

	return Form::selectFormGroup($name, $options,$title,$formname,$attributes);
});

Form::macro('venueFormGroup', function($name, $title, $formname, $attributes)
{
	$options = Filmoteca\Models\Courses\Venue::all(['id','name'])->lists('name','id');

	return Form::selectFormGroup($name, $options,$title,$formname,$attributes);
});

Form::macro('yearFormGroup', function($name, $title, $formname, $attributes)
{
	$minYear = 1959;

	if(isset($attributes['minYear'])){

		$minYear = $attributes['minYear'];
	}

	$options = range($minYear, intval(date('Y') + 2));

	return Form::selectFormGroup($name, array_combine($options, $options),$title, $formname, $attributes);
});

Form::macro('auditoriumFormGroup', function($name, $title, $formname, $attributes)
{
	$tmp = Filmoteca\Models\Exhibitions\Auditorium::all(['id','name'])->lists('name','id');

	$options = [0 => 'Ninguna'];

	foreach($tmp as $key => $value)
	{
		$options[$key] = $value;
	}

	return Form::selectFormGroup($name, $options,$title,$formname,$attributes);
});

Form::macro('theMediaFormGroup', function($name, $title, $formname, $attributes){

	$options = ['Televisión', 'Periódico', 'Radio', 'Otro'];

	return Form::selectFormGroup($name, $options,$title,$formname,$attributes);
});

Form::macro('selectFormGroup', function($name, $options, $title, $formname, $attr)
{
	return "\n" .
		'<div class="form-group"' . "\n" .
		'	ng-class="{\'has-error\' : film_form.' . $name . '.$invalid }">' . "\n" .
		'	<label for="' . $name . '" class="col-sm-2 control-label text-right">' . $title . '</label>' . "\n" .
		'	<div class="col-sm-10">' . "\n" .
		
		Form::select($name, $options, null, $attr) .

		'	</div>' ."\n".
		'</div>' . "\n";
});

/**
 * By default all the text area inputs have the widget CKEditor.
 *
 * If you do not want the CKEditor you must set the $attr['class'] = 'no-ckeditor'.
 */
Form::macro('textareaFormGroup', function($name, $title, $formname, $attr)
{
	$attr['class'] = isset($attr['class']) ? $attr['class']  : ''; 

	/**
	 * If it does not has a ckeditor class then we add a full editor.
	 */
	if( !Str::contains($attr['class'], 'ckeditor') ){

		$attr['class'] .= ' ckeditor-full';
	}
	
	return Form::wrapperInput($name, $title, Form::textarea($name, null, $attr));
});

Form::macro('wrapperInput', function($name, $title, $input)
{
	return "\n" .
	'<div class="form-group">' . "\n" .
	'	<label for="' . $name . '" class="col-sm-2 control-label text-right">' . $title . '</label>' . "\n" .
	'	<div class="col-sm-10">' . "\n" .
	'	' . $input . "\n" .
	'	</div>' . "\n" .
	'</div>'  . "\n";
});

