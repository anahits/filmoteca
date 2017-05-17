<?php

namespace Filmoteca\Exhibition\Type;

use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class ScheduleCollection
 * @package Filmoteca\Exhibitions\Type
 */
class ScheduleCollection extends Collection
{
    const DATE_FORMAT = 'Ymd';
    const DATE_TIME_FORMAT = 'YmdHis';

    /**
     * @return ScheduleCollection
     */
    public function groupByAuditorium()
    {
        $schedules = $this
            ->groupBy(function (Schedule $schedule) {
                return $schedule->getAuditorium()->getId();
            })
            ->map(function ($group) {
                return new ScheduleCollection($group);
            });

        return $schedules;
    }

    /**
     * @return static
     */
    public function groupByDate()
    {
        $schedules = $this
            ->groupBy(function (Schedule $schedule) {
                return $schedule->getEntry()->format(MYSQL_DATE_FORMAT);
            })
            ->map(function (array $collection) {
                return new ScheduleCollection($collection);
            });

        return $schedules;
    }

    /**
     * @return ScheduleCollection
     */
    public function onlyToday()
    {
        return $this->only(Carbon::today());
    }

    /**
     * @param Carbon $date
     * @return $this
     */
    public function only(Carbon $date)
    {
        $schedules = $this
            ->filter(function (Schedule $schedule) use ($date) {
                $entryValue = intval($schedule->getEntry()->format(self::DATE_FORMAT));
                $dateValue = intval($date->format(self::DATE_FORMAT));

                return $entryValue - $dateValue === 0;
            })->orderByEntry();

        return $schedules;
    }

    /**
     * @return $this
     */
    public function orderByEntry()
    {
        $schedules = $this->sort(function (Schedule $a, Schedule $b) {
            $aValue = intval($a->getEntry()->format(self::DATE_TIME_FORMAT));
            $bValue = intval($b->getEntry()->format(self::DATE_TIME_FORMAT));

            if ($aValue === $bValue) {
                return 0;
            }

            return $aValue < $bValue? -1: 1;
        });

        return $schedules;
    }
}
