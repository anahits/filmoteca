<?php

namespace Filmoteca\Exhibition\Type\Calendar;

use Carbon\Carbon;
use Filmoteca\Exhibition\ExhibitionsManager;

/**
 * Class Day
 * @package Filmoteca\Exhibitions\Type\Calendar
 */
class Day
{
    /**
     * @var Carbon
     */
    protected $date;

    /**
     * @var int
     */
    protected $exhibitionsNumber = 0;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @return Carbon
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param Carbon $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDateInFormatToUrl()
    {
        $monthsMap = ExhibitionsManager::getMonthsMap();
        $date = $this->date->day . '-' . $monthsMap[$this->date->month -1] . '-' . $this->date->year;

        return $date;
    }

    /**
     * @return int
     */
    public function getExhibitionsNumber()
    {
        return $this->exhibitionsNumber;
    }

    /**
     * @param int $exhibitionsNumber
     */
    public function setExhibitionsNumber($exhibitionsNumber)
    {
        $this->exhibitionsNumber = $exhibitionsNumber;
    }

    /**
     * @return bool
     */
    public function hasExhibitions()
    {
        return $this->exhibitionsNumber > 0;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getNumber()
    {
        return $this->date->day;
    }

    public function isToday()
    {
        return Carbon::today()->day === $this->getNumber();
    }
}
