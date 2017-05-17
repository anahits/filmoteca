<?php

namespace Filmoteca\Exhibition\Type;

/**
 * Interface Film
 * @package Filmoteca\Exhibitions\Type
 */
interface Film
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
     * @return String
     */
    public function getTitle();

    /**
     * @param String $title
     */
    public function setTitle($title);

    /**
     * @return String
     */
    public function getOriginalTile();

    /**
     * @param String $originalTile
     */
    public function setOriginalTile($originalTile);

    /**
     * @return \DateTime
     */
    public function getDuration();

    /**
     * @param \DateTime $duration
     */
    public function setDuration($duration);

    /**
     * @return array
     */
    public function getYears();

    /**
     * @param array $years
     */
    public function setYears($years);

    /**
     * @return String
     */
    public function getGenre();

    /**
     * @param String $genre
     */
    public function setGenre($genre);

    /**
     * @return mixed
     */
    public function getDirector();

    /**
     * @param mixed $director
     */
    public function setDirector($director);

    /**
     * @return String
     */
    public function getScript();

    /**
     * @param String $script
     */
    public function setScript($script);

    /**
     * @return String
     */
    public function getPhotographic();

    /**
     * @param String $photographic
     */
    public function setPhotographic($photographic);

    /**
     * @return String
     */
    public function getMusic();

    /**
     * @param String $music
     */
    public function setMusic($music);

    /**
     * @return String
     */
    public function getEdition();

    /**
     * @param String $edition
     */
    public function setEdition($edition);

    /**
     * @return String
     */
    public function getProduction();

    /**
     * @param String $production
     */
    public function setProduction($production);

    /**
     * @return String
     */
    public function getCast();

    /**
     * @param String $cast
     */
    public function setCast($cast);

    /**
     * @return String
     */
    public function getSynopsis();
    /**
     * @param String $synopsis
     */
    public function setSynopsis($synopsis);

    /**
     * @return String
     */
    public function getTrailer();

    /**
     * @param String $trailer
     */
    public function setTrailer($trailer);

    /**
     * @return ImageAttachment
     */
    public function getCover();

    /**
     * @param ImageAttachment $attachment
     */
    public function setCover(ImageAttachment $attachment);

    /**
     * @return String
     */
    public function getNotes();

    /**
     * @param String $notes
     */
    public function setNotes($notes);

    /**
     * @return array
     */
    public function getCountries();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @param $slug
     */
    public function setSlug($slug);
}
