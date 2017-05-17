<?php

namespace Filmoteca\Repository;

use Filmoteca\Models\Exhibitions\Auditorium;

/**
 * Class AuditoriumsRepository
 * @package Filmoteca\Repository
 */
class AuditoriumsRepository extends ResourcesRepository
{
    /**
     * AuditoriumsRepository constructor.
     * @param Auditorium $auditorium
     */
    public function __construct(Auditorium $auditorium)
    {
        $this->resource = $auditorium;
    }

    /**
     * @param int $id
     * @return \Filmoteca\Exhibition\Type\Auditorium
     */
    public function find($id)
    {
        /**
         * Hay que usar with antes de where para traer la relación.
         */
        $resource = $this->resource
            ->with('venue')
            ->where('id', $id)
            ->first();

        return $resource;
    }

    /**
     * @param string $slug
     * @return \Filmoteca\Exhibition\Type\Auditorium
     */
    public function findBySlug($slug)
    {
        $resource = $this->resource
            ->with('venue')
            ->where('slug', '=', $slug)
            ->first();

        return $resource;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->resource->all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function allVenues()
    {

        $venues = $this->resource
            ->where('venue_id', 0)
            ->get()
            ->map(function ($venue) {
                $venue->auditoriums = $this->auditoriums($venue->id);
                return $venue;
            });

        return $venues;
    }

    /**
     * @param int $venueId
     * @return \Illuminate\Support\Collection
     */
    protected function auditoriums($venueId)
    {
        $auditoriums = $this->all();

        return $auditoriums->filter(function ($auditorium) use ($venueId) {
            return $venueId == $auditorium->venue_id;
        });
    }
}

