<?php

namespace Filmoteca\Exhibition\Type;

use DateTime;

/**
 * Interface Schedule
 * @package Filmoteca\Exhibitions\Type
 */
interface Schedule
{
    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param DateTime $entry
     */
    public function setEntry(DateTime $entry);

    /**
     * @return DateTime
     */
    public function getEntry();

    /**
     * @param Auditorium $auditorium
     */
    public function setAuditorium(Auditorium $auditorium);

    /**
     * @return Auditorium
     */
    public function getAuditorium();

    /**
     * @param Exhibition $exhibition
     */
    public function setExhibition(Exhibition $exhibition);

    /**
     * @return Exhibition
     */
    public function getExhibition();
}
