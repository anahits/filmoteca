<?php namespace Filmoteca\Repository;

use Filmoteca\Models\Exhibitions\Billboard;

/**
 * Class BillboardsRepository
 * @package Filmoteca\Repository
 */
class BillboardsRepository extends ResourcesRepository
{
    /**
     * BillboardsRepository constructor.
     * @param Billboard $resource
     */
    public function __construct(Billboard $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function thisYear()
    {
        return $this->findByYear(date('Y'));
    }

    /**
     * @return mixed
     */
    public function previousYear()
    {
        return $this->findByYear(date('Y') - 1);
    }

    /**
     * @param $year
     * @return mixed
     */
    public function byYear($year)
    {
        return $this->findByYear($year);
    }

    /**
     * @param $year
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByYear($year)
    {
        $billboards = Billboard::whereRaw('YEAR(created_at) = ?', [$year])
            ->orderBy('created_at', 'desc')
            ->get();

        return $billboards;
    }

    /**
     * @return Billboard
     */
    public function findNewer()
    {
        $billboard = Billboard::orderBy('created_at', 'DESC')->limit(1)->first();

        return $billboard;
    }
}
