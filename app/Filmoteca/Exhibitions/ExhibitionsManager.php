<?php

namespace Filmoteca\Exhibition;

use Filmoteca\Repository\ExhibitionsRepository;
use Filmoteca\Repository\SchedulesRepository;
use InvalidArgumentException;
use Illuminate\Support\Collection;
use Filmoteca\Models\Exhibitions\Exhibition;
use Filmoteca\Models\Exhibitions\ExhibitionFilm;
use Filmoteca\Models\Exhibitions\Schedule;
use Carbon\Carbon;

/**
 * Class ExhibitionsManager
 * @package Filmoteca
 */
class ExhibitionsManager
{
    const DATE_FORMAT = 'j-n-Y';

    /**
     * @var CalendarGenerator
     */
    protected $calendarGenerator;

    /**
     * @var SchedulesRepository
     */
    protected $schedulesRepository;

    /**
     * @var ExhibitionsRepository
     */
    protected $exhibitionsRepository;

    /**
     * @param CalendarGenerator $calendarGenerator
     * @param SchedulesRepository $schedulesRepository
     * @param ExhibitionsRepository $exhibitionsRepository
     */
    public function __construct(
        CalendarGenerator $calendarGenerator,
        SchedulesRepository $schedulesRepository,
        ExhibitionsRepository $exhibitionsRepository
    ) {
        $this->calendarGenerator = $calendarGenerator;
        $this->schedulesRepository = $schedulesRepository;
        $this->exhibitionsRepository = $exhibitionsRepository;
    }

    /**
     * @var array
     */
    private static $monthsMap = [
        'enero', 'febrero', 'marzo', 'abril', 'mayo','junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre',
        'diciembre'
    ];

    /**
     * @return array
     */
    public static function getMonthsMap()
    {
        return self::$monthsMap;
    }

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
            ->filter(function ($exhibition) {

                return !is_null($exhibition->type);
            })->map(function ($exhibition) {

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
        $auditoriums = $exhibitions->reduce(function ($accum, $exhibition) {

            return $accum->merge($exhibition->auditoriums);
        }, Collection::make([]));

        return $auditoriums;
    }

    /**
     * @param array $data
     * @return Exhibition
     */
    public function createAndSave(array $data)
    {
        $exhibition = isset($data['id']) ? Exhibition::find($data['id']) : new Exhibition();

        if (isset($data['exhibition_film']['id'])) {
            $exhibitionFilm = ExhibitionFilm::find($data['exhibition_film']['id']);
        } else {
            $exhibitionFilm = new ExhibitionFilm();
        }

        $exhibitionFilm->film_id = $data['exhibition_film']['film']['id'];
        $exhibitionFilm->save();
        $exhibition->exhibitionFilm()->associate($exhibitionFilm);

        $exhibition->notes = isset($data['notes']) ? $data['notes'] : '';

        if (isset($data['icon']['id'])) {
            $exhibition->type_id = $data['icon']['id'];
        } else {
            $exhibition->type_id = null;
        }

        $exhibition->save();

        Schedule::where('exhibition_id', $exhibition->id)->delete();

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


    /**
     * @param string $humanDate
     * @param string $delimiter
     * @return string
     * @throws InvalidArgumentException
     */
    public function convertMonthFromHumanToNumber($humanDate, $delimiter = '-')
    {
        $monthPosition  = 1;
        $dateParts      = explode($delimiter, $humanDate);

        if (count($dateParts) !== 3) {
            throw new InvalidArgumentException(
                'Invalid format. Required format is ' . self::DATE_FORMAT . '. Date given ' . $humanDate
            );
        }

        $monthNumber = array_search($dateParts[$monthPosition], self::$monthsMap);

        if (is_bool($monthNumber)) {
            throw new InvalidArgumentException('The month "' . $dateParts[$monthPosition] . '" is not valid.');
        }

        $dateParts[$monthPosition] = $monthNumber + 1;

        return implode($delimiter, $dateParts);
    }

    /**
     * @param Carbon $date The date is cloned internally so it is avoided side-effects
     * @return array
     */
    public function getCalendar(Carbon $date)
    {
        $date = clone $date;
        $calendar = $this->calendarGenerator->generate($date);
        $schedules = $this->schedulesRepository->findOfMonth($date)
            ->groupBy(function (Type\Schedule $schedule) {
                return $schedule->getEntry()->day;
            })->all();

        /** @var \Filmoteca\Exhibition\Type\Calendar\Day $day */
        foreach ($calendar->getDays() as $day) {
            $dayNumber = $day->getNumber();
            if (array_key_exists($dayNumber, $schedules)) {
                $day->setExhibitionsNumber(count($schedules[$dayNumber]));
            }
        }

        return $calendar;
    }

    /**
     * @param Collection $exhibitions
     * @return Collection
     */
    public function getFilmsTitles(Collection $exhibitions)
    {
        $titles = $exhibitions->map(function (Exhibition $exhibition) {
            return $exhibition->getFilm()->getTitle();
        });

        return $titles;
    }

    /**
     * @param string $title
     * @return \Illuminate\Pagination\Paginator
     */
    public function findByTitleSinceToday($title)
    {
        $until = Carbon::today()->addMonths(2);
        $exhibitions = $this->exhibitionsRepository->findBy(compact('title'), Carbon::today(), $until);

        return $exhibitions;
    }
}
