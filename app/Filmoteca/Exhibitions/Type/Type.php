<?php

namespace Filmoteca\Exhibition\Type;

use Carbon\Carbon;

/**
 * Interface Type
 * @package Filmoteca\Exhibitions\Type
 */
interface Type
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @param string $slug
     */
    public function setSlug($slug);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return Carbon
     */
    public function getSince();

    /**
     * @param Carbon $since
     */
    public function setSince(Carbon $since);

    /**
     * @return Carbon
     */
    public function getUntil();

    /**
     * @param Carbon $until
     */
    public function setUntil(Carbon $until);

    /**
     * @param $description
     */
    public function setDescription($description);

    /**
     * @return Attachment
     */
    public function getImage();

    /**
     * @param ImageAttachment $imagePath
     */
    public function setImage(ImageAttachment $imagePath);
}
