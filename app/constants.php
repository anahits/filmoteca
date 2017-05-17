<?php

App::singleton('words', function()
{
    return array(
		'Men', 
		'X',
		'La',
		'El',
		'Casa',
		'Lago',
		'Futurama',
		'Resident',
		'Black',
		'Men',
		'Red',
		'Girl',
		'Awesome',
		'All',
		'Is',
		'Dream',
	);
});

App::singleton('names',function()
{
	return array(
		'Victor',
		'Aguilar',
		'Gonzaga',
		'Clear',
		'Sharon',
		'Jill',
		'Valentine',
		'Chris',
		'Redfield',
		'Albert',
		'Wesker',
		'Iron',
		'Tony',
		'Stark',
		'Steve',
		'Carlos',
		'Olivera',
		'Nemesis',
	);
});

App::singleton('iconographic', function()
{
	return DB::table('exhibition_types')
				->get()
				->lists('name','id');
});

define('MYSQL_DATE_FORMAT', 'Y-m-d');
define('MYSQL_TIME_FORMAT', 'H:i:s');
define('MYSQL_DATE_TIME_FORMAT', 'Y-m-d H:i:s');
