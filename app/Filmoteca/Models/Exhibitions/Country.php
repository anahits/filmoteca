<?php

namespace Filmoteca\Models\Exhibitions;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Country
 * @package Filmoteca\Models
 */
class Country extends Eloquent
{

    public function films()
    {
        return $this->belongsToMany('Filmoteca\Models\Exhibitions\Film');
    }

    /**
     * Return a Collection of countries with the name given.
     * @param  String $name Country name
     * @return Collection   Collection of countries.
     */
    public function findByName($name)
    {
        if (!is_string($name)) {
            return Collection::make([]);
        }

        return $this->where('name', $name)->get();
    }

    public function getName()
    {
        return $this->name;
    }
}
