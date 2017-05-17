<?php

namespace Filmoteca\Utils;

use Illuminate\Support\Contracts\JsonableInterface;

/**
 * Class FilmotecaConfig
 * @package Filmoteca\Utils
 */
class FilmotecaConfig implements JsonableInterface
{
    /**
     * @var array
     */
    private $config;
    
    public function __construct()
    {
        $this->config = [];
    }

    /**
     * @param array $extraConfig
     */
    public function addConfig(array $extraConfig)
    {
        $this->config = array_merge($this->config, $extraConfig);
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->config);
    }
}
