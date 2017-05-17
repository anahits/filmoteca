<?php

namespace Filmoteca\Transformers;

use Filmoteca\Models\Exhibitions\Film;
use Illuminate\Support\Collection;

class FilmTransformer extends Transformer
{
    /**
     * @param Film|Collection $item
     * @return array
     */
    public function transform($item)
    {
        if ($item instanceof Film) {
            return $item->toArray();
        }

        return parent::transform($item);
    }

    /**
     * @param Collection $films
     * @return Collection
     */
    public function transformCollection(Collection $films)
    {
        $transformedFilms = $films->map(function (Film $film) {
            return [
                'id'                => $film->id,
                'title'             => $film->title,
                'original_title'    => $film->original_title,
                'years'             => $film->years,
                'countries'         => $film->countries()->get(),
                'synopsis'          => $film->synopsis,
                'director'          => $film->director,
                'created_at'        => $film->created_at->toDateString(),
                'cover'             => [
                    'thumbnail'     => $film->image->url('thumbnail'),
                ]
            ];
        });

        return $transformedFilms;

    }
}
