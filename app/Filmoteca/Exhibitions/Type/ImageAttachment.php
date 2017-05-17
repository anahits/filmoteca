<?php

namespace Filmoteca\Exhibition\Type;

/**
 * Class ImageAttachment
 * @package Filmoteca\Exhibitions\Type
 */
class ImageAttachment extends Attachment
{
    /**
     * @var string
     */
    protected $smallImageUrl;

    /**
     * @var string
     */
    protected $mediumImageUrl;

    /**
     * @var string
     */
    protected $originalImageUrl;

    /**
     * @return string
     */
    public function getSmallImageUrl()
    {
        return $this->smallImageUrl;
    }

    /**
     * @param string $smallImageUrl
     */
    public function setSmallImageUrl($smallImageUrl)
    {
        $this->smallImageUrl = $smallImageUrl;
    }

    /**
     * @return string
     */
    public function getMediumImageUrl()
    {
        return $this->mediumImageUrl;
    }

    /**
     * @param string $mediumImageUrl
     */
    public function setMediumImageUrl($mediumImageUrl)
    {
        $this->mediumImageUrl = $mediumImageUrl;
    }

    /**
     * @return string
     */
    public function getOriginalImageUrl()
    {
        return $this->originalImageUrl;
    }

    /**
     * @param string $originalImageUrl
     */
    public function setOriginalImageUrl($originalImageUrl)
    {
        $this->originalImageUrl = $originalImageUrl;
    }

    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->originalImageUrl = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->originalImageUrl;
    }
}
