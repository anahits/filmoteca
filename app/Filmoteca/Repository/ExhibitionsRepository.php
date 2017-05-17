<?php namespace Filmoteca\Repository;

use App;
use Carbon\Carbon;
use Filmoteca\Exhibition\Type\Type;
use Illuminate\Database\Eloquent\Builder;
use Filmoteca\Models\Exhibitions\Exhibition;
use Filmoteca\Models\Exhibitions\ExhibitionFilm;
use Filmoteca\Models\Exhibitions\Film;
use Filmoteca\Pagination\Results;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;

/**
 * Class ExhibitionsRepository
 * @package Filmoteca\Repository
 */
class ExhibitionsRepository extends ResourcesRepository implements PageableRepositoryInterface
{
    const EXHIBITIONS_FOR_PAGE = 10;

    /**
     * @var ExhibitionFilm
     */
    protected $exhibitionFilm;

    /**
     * @var Exhibition
     */
    protected $resource;

    /**
     * @var Film
     */
    protected $film;

    public function __construct()
    {
        $this->resource = new Exhibition;
    }

    /**
     * @param Carbon $date
     * @return \Illuminate\Pagination\Paginator
     */
    public function findByDate(Carbon $date)
    {
        return $this->findByDateInterval($date, $date->copy()->endOfDay());
    }

    /**
     * @param Carbon $since
     * @param Carbon $until
     * @param int $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function findByDateInterval(Carbon $since, Carbon $until, $limit = self::EXHIBITIONS_FOR_PAGE)
    {
        $interval = [$since, $until];

        $builder = Exhibition::
            whereHas('schedules', function ($query) use ($interval) {
                $query->whereBetween('entry', $interval);
            });

        $exhibitions = $this->addRelationships($builder, $limit);

        return $exhibitions;
    }

    /**
     * El código de esta función quedo muy mal. Yo esperabá que eloquente
     * pudiera guardar los datos que en el array $data sin problemas.
     * pero te tengo que acomodar cada dato para que coincida con las columnas
     * de la base de datos.
     *
     * Hay que encontrar una mejor forma de hacer esto.
     *
     * ## ENHANCEMENT
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function store(array $data = null)
    {
        $d = [];
        $d['type_id'] = $data['type']['id'];

        $exhibitionFilm = App::make('Filmoteca\Models\Exhibitions\ExhibitionFilm');

        $exhibitionFilm->fill(['film_id' => $data['exhibition_film']['film']['id']])
            ->save();

        $d['exhibition_film_id'] = $exhibitionFilm->id;

        return $this->resource->create($d);
    }

    public function find($id)
    {
        return Exhibition::where('id', $id)
            ->with(
                'schedules',
                'schedules.auditorium',
                'exhibitionFilm',
                'exhibitionFilm.film',
                'type'
            )
            ->first();
    }

    /**
     * @param int $page
     * @param string $query
     * @param int $amount
     * @return \Filmoteca\Pagination\Results
     */
    public function paginate($page = 1, $query = '', $amount = 15)
    {
        $results = Results::make();

        $resources = $this
            ->resource
            ->whereHas('exhibitionFilm', function ($q) use ($query) {

                $q->whereHas('film', function ($q) use ($query) {
                    $q->where('films.title', 'like', '%' . $query . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->skip($amount * ($page - 1))
            ->take($amount)
            ->with('exhibitionFilm', 'exhibitionFilm.film')
            ->get();

        $total = $this
            ->resource
            ->whereHas('exhibitionFilm', function ($q) use ($query) {

                $q->whereHas('film', function ($q) use ($query) {
                    $q->where('films.title', 'like', '%' . $query . '%');
                });
            })
            ->count();

        $results->setTotal($total);
        $results->setItems($resources);

        return $results;
    }

    public function update($id, array $data = null)
    {
        $exhibition = $this->resource
            ->findOrFail($data['id'])
            ->fill($data);

        $exhibition->save();

        return true;
    }

    /**
     * @param $fields
     * @param Carbon $since
     * @param Carbon $until
     * @param int $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function findBy($fields, Carbon $since, Carbon $until, $limit = self::EXHIBITIONS_FOR_PAGE)
    {
        if (empty($fields)) {
            return Collection::make([]);
        }

        $builder = Film::getQuery();
        $dateInterval = [$since->format(MYSQL_DATE_TIME_FORMAT), $until->format(MYSQL_DATE_TIME_FORMAT)];

        foreach ($fields as $name => $value) {
            $builder->where($name, 'like', '%' . $value . '%');
        }

        $results = $builder->get(['id']);

        if (empty($results)) {
            return \Paginator::make([], 0, 1);
        }

        $filmsIds = Collection::make($results)->map(function (\stdClass $dummyObject) {
            return $dummyObject->id;
        })->toArray();

        $resourcesBuilder = Exhibition::whereHas('exhibitionFilm', function ($builder) use ($filmsIds) {
            $builder->whereHas('film', function (Builder $builder) use ($filmsIds) {
                $builder->whereIn('films.id', $filmsIds);
            });
        })->whereHas('schedules', function (Builder $query) use ($dateInterval) {
            $query->whereBetween('entry', $dateInterval);
        });

        $resources = $this->addRelationships($resourcesBuilder, $limit);

        return $resources;
    }

    /**
     * The exhibitions of the current month.
     *
     * @return Collection
     */
    public function findLast()
    {
        $today = Carbon::now();

        $from = Carbon::createFromDate(
            $today->year,
            $today->month,
            1
        );

        $until = Carbon::createFromDate(
            $today->year,
            $today->month,
            $today->daysInMonth
        );

        return $this->findByDateInterval($from, $until);
    }

    /**
     * @param int $month
     * @return Collection
     */
    public function findByMonth($month = 0)
    {
        if (!is_int($month) || $month < 1 || $month > 12) {
            return $this->exhibition->findLast();
        }

        $currentDate = Carbon::now();
        $currentDate->month = $month;

        $from = Carbon::createFromDate(
            $currentDate->year,
            $currentDate->month,
            1
        )->toDateString();

        $until = Carbon::createFromDate(
            $currentDate->year,
            $currentDate->month,
            $currentDate->daysInMonth
        )->toDateString();

        return $this->findByDateInterval($from, $until);
    }

    public function findByCycle(Type $cycle, Carbon $since, Carbon $until, $limit = self::EXHIBITIONS_FOR_PAGE)
    {
        $dateInterval = [$since, $until];

        $builder = Exhibition::where('type_id', $cycle->getId())
            ->whereHas('schedules', function (Builder $query) use ($dateInterval) {
                $query->whereBetween('entry', $dateInterval);
            });

        $exhibitions = $this->addRelationships($builder, $limit);

        return $exhibitions;
    }

    /**
     * @param $slug
     * @param Carbon $since
     * @param Carbon $until
     * @param int $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function findByFilmSlug($slug, Carbon $since, Carbon $until, $limit = self::EXHIBITIONS_FOR_PAGE)
    {
        return $this->findBy(['slug' => $slug], $since, $until, $limit);
    }

    /**
     * @param Builder $builder
     * @param $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function addRelationships(Builder $builder, $limit)
    {
        $exhibitions = $builder->with(
            'schedules',
            'schedules.auditorium',
            'exhibitionFilm',
            'exhibitionFilm.film',
            'exhibitionFilm.film.genre',
            'exhibitionFilm.film.countries',
            'type'
        )->paginate($limit);

        return $exhibitions;
    }

    /**
     * @param array|null $schedules
     * @return mixed
     */
    protected function makeSchedules(array $schedules = null)
    {
        return array_map(function ($a_schedule) {

            if (isset($data['id'])) {
                $schedule = App::make('Filmoteca\Models\Exhibitions\Schedule')
                    ->findOrFail($a_schedule['id'])
                    ->fill($a_schedule)
                    ->save();
            } else {
                $a_schedule['auditorium_id'] = $a_schedule['auditorium']['id'];
                $schedule = App::make('Filmoteca\Models\Exhibitions\Schedule')
                    ->fill($a_schedule)
                    ->save();
            }

            return $schedule;
        }, $schedules);
    }
}
