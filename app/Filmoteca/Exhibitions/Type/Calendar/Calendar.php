<?php

namespace Filmoteca\Exhibition\Type\Calendar;

use Carbon\Carbon;

/**
 * Class Calendar
 * @package Filmoteca\Exhibitions\Type\Calendar
 */
class Calendar
{
    /**
     * @var array[Week]
     */
    protected $weeks;

    /**
     * @return array
     */
    public function getWeeks()
    {
        return $this->weeks;
    }

    /**
     * @param array $weeks
     */
    public function setWeeks($weeks)
    {
        $this->weeks = $weeks;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        $days = array_reduce($this->weeks, function ($days, Week $week) {
            $days = array_merge($days, $week->getDays());

            return $days;
        }, []);

        return $days;
    }

    public function getToday()
    {
        return Carbon::today();
    }
}
