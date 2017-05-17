<?php

namespace Filmoteca\Exhibition\Type;

/**
 * Interface Exhibitions
 * @package Filmoteca\Exhibitions\Type
 */
interface Exhibition
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return Film
     */
    public function getFilm();

    /**
     * @param Film $film
     */
    public function setFilm(Film $film);

    /**
     * @return ScheduleCollection
     */
    public function getSchedules();

    /**
     * @param ScheduleCollection $schedules
     */
    public function setSchedules(ScheduleCollection $schedules);

    /**
     * @return Type
     */
    public function getType();

    /**
     * @param Type $type
     */
    public function setType(Type $type);

    /**
     * @return string
     */
    public function getNotes();

    /**
     * @param string $notes
     */
    public function setNotes($notes);
}
