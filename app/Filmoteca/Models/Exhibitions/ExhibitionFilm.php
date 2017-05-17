<?php

namespace Filmoteca\Models\Exhibitions;

use Eloquent;

/**
 * Class ExhibitionFilm
 * @package Filmoteca\Models\Exhibitions
 */
class ExhibitionFilm extends Eloquent
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return mixed
     */
    public function film()
    {
        return $this->belongsTo('Filmoteca\Models\Exhibitions\Film');
    }
}
