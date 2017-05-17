<?php namespace Filmoteca\Repository;

use Filmoteca\Models\FilmotecaMedal;
use Illuminate\Support\Collection;

class FilmotecaMedalsRepository extends ResourcesRepository
{
    public function __construct(FilmotecaMedal $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @param $name
     * @return Collection
     */
    public function findByName($name)
    {
        return $this->resource->where('name', 'like', '%' . $name . '%')->get();
    }
}
