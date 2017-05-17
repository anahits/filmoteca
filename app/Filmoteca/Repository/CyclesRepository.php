<?php

namespace Filmoteca\Repository;

use Carbon\Carbon;
use Filmoteca\Models\Exhibitions\Type;

class CyclesRepository
{
    /**
     * @return \Illuminate\Pagination\Paginator
     */
    public function findSinceToday()
    {
        $today = Carbon::today()->format(MYSQL_DATE_TIME_FORMAT);
        $cycles = Type::where('until', '>', $today)->paginate();

        return $cycles;
    }

    /**
     * @param $slug
     * @return \Filmoteca\Exhibition\Type\Type
     */
    public function findBySlug($slug)
    {
        $cycle = Type::where('slug', $slug)->first();

        return $cycle;
    }
}
