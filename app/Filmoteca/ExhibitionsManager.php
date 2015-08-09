<?php namespace Filmoteca;

use Illuminate\Database\Eloquent\Collection;
use Filmoteca\Models\Exhibitions\Exhibition;
use Filmoteca\Models\Exhibitions\ExhibitionFilm;
use Filmoteca\Models\Exhibitions\Schedule;

class ExhibitionsManager
{
	/**
	 * Devuelve una lista de los distintos iconos de la colección de
	 * exhibiciones dada.
	 *
	 * Un icono representa un tipo de exhibición.
	 * 
	 * @param $exhibitions Lista de exhibiciones.
	 * @return Collection Lista de todos los distintos iconos de las exhibiciones dadas.
	 */
	public function getIcons($exhibitions)
	{
		return $exhibitions
			->filter(function($exhibition){

				return !is_null( $exhibition->type );
			})->map(function($exhibition){

				return $exhibition->type;
			})->unique();
	}

	/**
	 * Devuelve una lista de los distintas salas de la colección de
	 * exhibiciones dada.
	 *
	 * 
	 * @param $exhibitions Lista de exhibiciones.
	 * @return  Collection Lista de todas las distintas salas de las exhibiciones dadas.
	 */
	public function getAuditoriums($exhibitions)
	{
		$auditoriums = $exhibitions->reduce(function($accum, $exhibition){

			return $accum->merge($exhibition->auditoriums);
		}, Collection::make([]));

		return $auditoriums;
	}

    /**
     * @param array $data
     */
    public function createAndSave(array $data)
    {
        $exhibition = new Exhibition();

        $exhibitionFilm = new ExhibitionFilm();
        $exhibitionFilm->film_id = $data['exhibition_film']['film']['id'];
        $exhibitionFilm->save();
        $exhibition->exhibitionFilm()->associate($exhibitionFilm);

        $exhibition->notes = isset($data['notes'])? $data['notes'] : '';

        if (isset($data['icon']['id'])) {
            $exhibition->type_id = $data['icon']['id'];
        }

        $exhibition->save();

        $schedules = array_reduce($data['schedules'], function ($schedules, $rawSchedule) {

            $schedule = new Schedule();
            $schedule->entry = $rawSchedule['entry'];
            $schedule->auditorium_id = $rawSchedule['auditorium']['id'];
            $schedules[] = $schedule;

            return $schedules;
        }, []);

        $exhibition->schedules()->saveMany($schedules);

        return Exhibition::findOrFail($exhibition->id);
    }
}