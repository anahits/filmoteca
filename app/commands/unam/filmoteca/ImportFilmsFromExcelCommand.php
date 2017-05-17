<?php namespace UNAM\Filmoteca;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Excel;
use App;
use Lang;
use Illuminate\Database\Eloquent\Collection;

class ImportFilmsFromExcelCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'filmoteca:iffe';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Import films froms a exel file.';

	protected $fields = [
		'titulo' 		=> 'title',
		'ano'			=> 'years',
		'duracion'		=> 'duration',
		'director'		=> 'director',
		// 'genero'		=> 'genre',
		'guion'			=> 'script',
		'fotografia' 	=> 'photographic',
		'musica'		=> 'music',
		'edicionmontaje'=> 'edition',
		'produccion'	=> 'production',
		'reparto'		=> 'cast',
		'sinopsis'		=> 'synopsis',
		'trailer'		=> 'trailer'
		];

	/**
	 * News genres added by the migration.
	 * @var Collection
	 */
	protected $newGenres;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->country 		= App::make('Filmoteca\Models\Exhibitions\Country');
		$this->film 		= App::make('Filmoteca\Models\Exhibitions\Film');
		$this->genre 		= App::make('Filmoteca\Models\Exhibitions\Genre');
		$this->newGenres 	= Collection::make([]);

		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		Excel::load($this->option('file-name'), function($reader){

			$reader->each(function($sheet){

				$this->insertAllRow($sheet);
			});
		});
	}

	protected function insertAllRow($sheet)
	{
		$sheet->each(function($row){

			$data = $this->parseFilm($row);

			$data['genre_id'] = $this->findGenreId($row['genero'], $data['title']);

			$film = $this->film->create($data);

			$country_id = $this->findCountryId($row['pais'], $film);

			$film->countries()->sync($country_id);
		});


		if(!$this->newGenres->isEmpty())
		{
			$this->info(
				Lang::get('commands.iffe.new-genres-added')
			);

			$this->info(implode(',', $this->newGenres->toArray()));
		}
	}

	protected function parseFilm($row)
	{
		$film = [];

		foreach($this->fields as $columnName => $fieldName)
		{
			if( empty($row[$columnName]) ){

				$row[$columnName] = '';
			}

			$film[$fieldName] = $row[$columnName];
		}

		return $film;
	}

	protected function findGenreId($name, $title)
	{
		$genres = $this->genre->findByName(trim($name));

		if( $genres->isEmpty() ){

			if(empty($name))
			{
				return 1;
			}

			$genre = $this->genre->create(['name' => $name]);

			$this->newGenres->add($name);

			return $genre->id;
		}

		if( $genres->count() > 1){

			$this->info(
				Lang::get(
					'commands.iffe.more-that-one-genre-found',
					[
						'name' 		=> $name,
						'title' 	=> $title
					]
				)
			);
		}

		return $genres->first()->id;
	}

	protected function findCountryId($names, $film)
	{
		$countriesNamesTmp = explode('/', $names);

		$countriesNames = array_map(function($name){
			return trim($name);
		}, $countriesNamesTmp);

		$countriesIds = [];

		foreach($countriesNames as $name)
		{
			$results = $this->country->findByName($name);

			if( $results->isEmpty() )
			{
				$this->info(
					Lang::get(
						'commands.iffe.no-country-found',
						[
							'name' 	=> $name,
							'id' 	=> $film->id
						]
					)
				);

				return [];
			}

			if( $results->count() > 1)
			{
				$this->info(
					Lang::get(
						'commands.iffe.more-that-one-country-found',
						[
							'name' 		=> $name,
							'id' 		=> $film->id,
							'title' 	=> $film->title
						]
					)
				);
			}

			$countriesIds[] = $results->first()->id;
		}

		return $countriesIds;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		$defaultFileName = 'input.xls';

		return array(
			array(
				'file-name',
				null,
				InputOption::VALUE_OPTIONAL,
				'File name. Default: ' . $defaultFileName,
				$defaultFileName),
		);
	}

}
