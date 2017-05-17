<?php

namespace Filmoteca\Exhibitions\Controllers\Frontend;

use Filmoteca\Repository\BillboardsRepository;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

/**
 * Class BillboardController
 * @package Filmoteca\Exhibitions\Controllers\Frontend
 */
class BillboardController extends Controller
{
    /**
     * @var BillboardsRepository
     */
    protected $repository;

    /**
     * BillboardController constructor.
     * @param BillboardsRepository $repository
     */
    public function __construct(BillboardsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $earlierBillboards = [];
        $currentYear = date('Y');
        $previousYear = (string)((int)$currentYear - 1);

        $thisYearBillboards = $this->repository->thisYear();
        $previousYearBillboards = $this->repository->previousYear();
        

        if ($thisYearBillboards->isEmpty()) {
            $lastBillboard = $previousYearBillboards->first();
        } else {
            $lastBillboard = $thisYearBillboards->shift();
        }

        $earlierBillboards[$currentYear] = $thisYearBillboards;
        $earlierBillboards[$previousYear] = $previousYearBillboards;

        $viewData = compact(
            'lastBillboard',
            'earlierBillboards'
        );

        return View::make('exhibitions.frontend.billboards.index', $viewData);
    }

    public function subscribe()
    {

    }
}
