<?php

namespace Filmoteca\Exhibition;

use Carbon\Carbon;
use Filmoteca\Exhibition\Type\Calendar\Calendar;
use Filmoteca\Exhibition\Type\Calendar\Day;
use Filmoteca\Exhibition\Type\Calendar\Week;

/**
 * Class ExhibitionCalendar
 * @package Filmoteca\Exhibitions
 */
class CalendarGenerator
{
    /**
     * @param Carbon $date
     * @return Calendar
     */
    public function generate(Carbon $date)
    {
        $firstOfCalendar = $this->getFirstDayOfCalendar($date);

        $weeks = $this->fillCalendar([], $firstOfCalendar);

        $calendar = new Calendar();
        $calendar->setWeeks($weeks);

        return $calendar;
    }

    /**
     * @param array $calendar
     * @param Carbon $date
     * @param int $weeks
     * @return array
     */
    protected function fillCalendar(array $calendar, Carbon $date, $weeks = 5)
    {
        if ($weeks === 0) {
            return $calendar;
        }

        $weekDays = $this->fillWeek([], $date);

        $week = new Week();
        $week->setDays($weekDays);
        $week->setNumber($date->weekOfMonth);

        $calendar[] = $week;

        $newDate = clone $date;

        return $this->fillCalendar($calendar, $newDate->addWeek(), --$weeks);
    }

    /**
     * @param array $week
     * @param Carbon $date
     * @return array
     */
    protected function fillWeek(array $week, Carbon $date)
    {
        $day = new Day();
        $day->setActive(true);
        $day->setDate($date);

        $week[$date->dayOfWeek] = $day;

        if (Carbon::SATURDAY === $date->dayOfWeek) {
            return $week;
        }

        $newDate = clone $date;

        return $this->fillWeek($week, $newDate->addDay());
    }

    /**
     * @param Carbon $date
     * @return Carbon
     */
    protected function getFirstDayOfCalendar(Carbon $date)
    {
        $firstOfMonth = Carbon::create($date->year, $date->month, $date->day)
            ->firstOfMonth();

        if ($firstOfMonth->dayOfWeek === Carbon::SUNDAY) {
            return $firstOfMonth;
        }

        while ($firstOfMonth->dayOfWeek !== Carbon::SUNDAY) {
            $firstOfMonth->subDay();
        }

        return $firstOfMonth;
    }
}
