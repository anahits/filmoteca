<?php

namespace Filmoteca\Exhibitions\Composer;

use Carbon\Carbon;
use Filmoteca\Repository\BillboardsRepository;
use Illuminate\View\View;
use Filmoteca\Exhibition\ExhibitionsManager;

/**
 * Class ExhibitionComposer
 * @package Filmoteca\Exhibitions\Composer
 */
class ExhibitionComposer
{
    /**
     * @var BillboardsRepository
     */
    protected $billboardsRepository;

    /**
     * @var ExhibitionsManager
     */
    protected $manager;

    /**
     * ExhibitionComposer constructor.
     * @param ExhibitionsManager $manager
     * @param BillboardsRepository $billboardsRepository
     */
    public function __construct(ExhibitionsManager $manager, BillboardsRepository $billboardsRepository)
    {
        $this->manager = $manager;
        $this->billboardsRepository = $billboardsRepository;
    }

    /**
     * @param $view
     */
    public function compose(View $view)
    {
        $viewData = $view->getData();

        $date = array_has($viewData, 'date') && $viewData['date'] ? $viewData['date']: Carbon::today();
        $calendar = $this->manager->getCalendar(Carbon::today());
        $lastBillboard = $this->billboardsRepository->findNewer();
        
        $view->with('calendar', $calendar);
        $view->with('date', $date);
        $view->with('lastBillboard', $lastBillboard);
    }
}
