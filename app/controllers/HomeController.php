<?php

use Filmoteca\Repository\NewsRepository;
use Filmoteca\Exhibition\ExhibitionsManager;
use Filmoteca\Repository\AdvertisementRepository;
use Filmoteca\Repository\CarouselsRepository;
use Carbon\Carbon;

/**
 * Class HomeController
 */
class HomeController extends BaseController
{
    /**
     * @param NewsRepository $newsRepository
     * @param ExhibitionsManager $exhibitionsManager
     * @param AdvertisementRepository $advertisementRepository
     * @param CarouselsRepository $carouselRepository
     */
    public function __construct(
        NewsRepository $newsRepository,
        ExhibitionsManager $exhibitionsManager,
        AdvertisementRepository $advertisementRepository,
        CarouselsRepository $carouselRepository
    ) {
        $this->newsRepository = $newsRepository;
        $this->exhibitionsManager = $exhibitionsManager;
        $this->advertisementRepository = $advertisementRepository;
        $this->carouselRepository = $carouselRepository;
    }

    public function index()
    {
        $date           = Carbon::today();
        $calendar       = $this->exhibitionsManager->getCalendar($date);
        $news           = $this->newsRepository->lastNews(6);
        $advertisements = $this->advertisementRepository->all();
        $carousels      = $this->carouselRepository->findToHome();

        $viewData = compact('news', 'advertisements', 'carousels', 'calendar', 'date');

        return View::make('pages.home.index', $viewData);
    }
}
