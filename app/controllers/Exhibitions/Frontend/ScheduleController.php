<?php

namespace Filmoteca\Exhibitions\Controllers\Frontend;

use Carbon\Carbon;
use Filmoteca\Repository\SchedulesRepository;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

/**
 * Class ScheduleController
 */
class ScheduleController extends Controller
{
    /**
     * @var SchedulesRepository
     */
    protected $schedulesRepository;

    /**
     * @param SchedulesRepository $schedulesRepository
     */
    public function __construct(SchedulesRepository $schedulesRepository)
    {
        $this->schedulesRepository = $schedulesRepository;
    }

    /**
     * It returns a chuck of HTML
     * @param $exhibitionId
     * @return \Symfony\Component\HttpFoundation\Response|static
     */
    public function search($exhibitionId)
    {

        if (Input::has('since')) {
            try {
                $since = Carbon::createFromFormat(MYSQL_DATE_FORMAT, Input::get('since'))->startOfDay();
            } catch (InvalidArgumentException $e) {
                return '';
            }
        } else {
            $since = null;
        }

        if (Input::has('until')) {
            try {
                $until = Carbon::createFromFormat(MYSQL_DATE_FORMAT, Input::get('until'));
            } catch (InvalidArgumentException $e) {
                return '';
            }
        } else {
            $until = null;
        }

        $schedules = $this->schedulesRepository->findByExhibitionAndDateInterval($exhibitionId, $since, $until);

        if ($schedules->isEmpty()) {
            return View::make('exhibitions.frontend.exhibitions.partials.none-extra-schedule');
        }

        return View::make('exhibitions.frontend.exhibitions.partials.more-schedules', compact('schedules'));
    }
}
