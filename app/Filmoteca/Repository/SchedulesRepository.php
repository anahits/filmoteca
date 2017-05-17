<?php

namespace Filmoteca\Repository;

use Filmoteca\Exhibition\Type\ScheduleCollection;
use Filmoteca\Models\Exhibitions\Schedule;
use Carbon\Carbon;

/**
 * Class SchedulesRepository
 * @package Filmoteca\Repository
 */
class SchedulesRepository
{
    /**
     * @var \Filmoteca\Models\Exhibitions\Schedule
     */
    protected $schedule;

    /**
     * @param Schedule $schedule
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * @param string $from
     * @param string $until
     * @param string $order Default Descending. Valid values: DESC | ASC.
     * @return \Illuminate\Support\Collection
     */
    public function findByDateIntervalGroupByAuditorium($from, $until, $order = 'DESC')
    {
        $schedules = $this->findByDateInterval($from, $until, $order);

        $groupedSchedules = $schedules->groupBy(function ($schedule) {
            return $schedule->auditorium->id;
        });

        return $groupedSchedules;
    }

    /**
     * @param string $since
     * @param string $until
     * @param string $order Default Descending. Valid values: DESC | ASC.
     * @return ScheduleCollection
     */
    public function findByDateInterval($since, $until, $order = 'DESC')
    {
        $since = Carbon::createFromFormat(MYSQL_DATE_FORMAT, $since);
        $until = Carbon::createFromFormat(MYSQL_DATE_FORMAT, $until);
        $until->endOfDay();

        $schedules = $this->find($since, $until, null, $order);

        return $schedules;
    }

    /**
     * @param $exhibitionId
     * @param Carbon $since
     * @param Carbon|null $until
     * @return ScheduleCollection
     */
    public function findByExhibitionAndDateInterval($exhibitionId, Carbon $since = null, Carbon $until = null)
    {
        if ($since === null) {
            $schedules = $this->schedule->where('exhibition_id', $exhibitionId)->get();
            return new ScheduleCollection($schedules->all());
        }

        $schedules = $this->find($since, $until, $exhibitionId);

        return $schedules;
    }

    /**
     * @param Carbon $since
     * @param Carbon|null $until
     * @param null $exhibitionId
     * @param string $order Default Descending. Valid values: DESC | ASC.
     * @return ScheduleCollection
     */
    public function find(Carbon $since, Carbon $until = null, $exhibitionId = null, $order = 'DESC')
    {
        $query = $this->schedule;

        if ($until === null) {
            $query = $query->where('entry', '>=', $since->format(MYSQL_DATE_TIME_FORMAT));
        } else {
            $interval = [
                $since->format(MYSQL_DATE_TIME_FORMAT),
                $until->format(MYSQL_DATE_TIME_FORMAT)
            ];
            $query = $query->whereBetween('entry', $interval);
        }

        if ($exhibitionId !== null) {
            $query = $query->where('exhibition_id', $exhibitionId);
        }

        $schedules = $query
            ->orderBy('entry', $order)
            ->with(
                'exhibition',
                'exhibition.exhibitionFilm',
                'exhibition.exhibitionFilm.film',
                'exhibition.exhibitionFilm.film.genre',
                'exhibition.exhibitionFilm.film.countries',
                'auditorium'
            )
            ->get();

        $schedulesCollection = new ScheduleCollection($schedules->all());
        // orderBy of eloquent does not work.
        $schedulesCollection->orderByEntry();

        return $schedulesCollection;
    }

    /**
     * @param Carbon $date
     * @return \Illuminate\Support\Collection
     */
    public function findOfMonth(Carbon $date)
    {
        $startDate = $date->firstOfMonth()->format(MYSQL_DATE_FORMAT);
        $endDate = $date->lastOfMonth()->format(MYSQL_DATE_FORMAT);

        $schedules = $this->findByDateInterval($startDate, $endDate);

        return $schedules;
    }
}
