<?php

namespace Filmoteca\Exhibition\Type;

/**
 * Interface Auditorium
 * @package Filmoteca\Exhibitions\Type
 */
interface Auditorium
{
    /**
     * @param $id
     * @return int
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @param string $slug
     */
    public function setSlug($slug);

    /**
     * @param string $address
     */
    public function setAddress($address);

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone);

    /**
     * @return string
     */
    public function getTelephone();

    /**
     * @param string $schedule
     */
    public function setSchedule($schedule);

    /**
     * @return string
     */
    public function getSchedule();

    /**
     * @param float $cost
     */
    public function setGeneralCost($cost);

    /**
     * @return float
     */
    public function getGeneralCost();

    /**
     * @param $cost
     */
    public function setSpecialCost($cost);

    /**
     * @param float $cost
     * @return float
     */
    public function getSpecialCost($cost);

    /**
     * @param string $map
     */public function setMap($map);

    /**
     * @return string
     */
    public function getMap();

    /**
     * @param ImageAttachment $image
     */
    public function setImage(ImageAttachment $image);

    /**
     * @return ImageAttachment
     */
    public function getImage();

    /**
     * @return Auditorium
     */
    public function getVenue();

    /**
     * @param Auditorium $venue
     */
    public function setVenue(Auditorium $venue);
}
