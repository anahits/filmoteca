<?php

namespace Filmoteca\Exhibition\Type\Calendar;

/**
 * Class Week
 * @package Filmoteca\Exhibitions\Type\Calendar
 */
class Week
{
    /**
     * @var array
     */
    protected $days;

    /**
     * @var int
     */
    protected $number;

    /**
     * @return array
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param array $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}
