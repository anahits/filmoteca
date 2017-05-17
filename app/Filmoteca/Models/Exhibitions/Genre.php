<?php

namespace Filmoteca\Models\Exhibitions;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Genre
 * @package Filmoteca\Models\Exhibitions
 */
class Genre extends Eloquent
{
    protected $fillable = ['name'];

    /**
     * @param $name
     * @return static
     */
    public function findByName($name)
    {
        if (!is_string($name)) {
            return Collection::make([]);
        }

        return $this->where('name', $name)->get();
    }
}
