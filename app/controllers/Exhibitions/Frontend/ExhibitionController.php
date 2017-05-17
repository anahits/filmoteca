<?php

namespace Filmoteca\Exhibitions\Controllers\Frontend;

use Carbon\Carbon;
use Filmoteca\Repository\ExhibitionsRepository;
use Filmoteca\Exhibition\ExhibitionsManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use InvalidArgumentException;

/**
 * Class ExhibitionController
 */
class ExhibitionController extends Controller
{
    const MAX_YEARS = 2;

    /**
     * @var ExhibitionsRepository
     */
    protected $repository;

    /**
     * @var ExhibitionsManager
     */
    protected $manager;

    /**
     * @var Carbon
     */
    protected $maxDate;

    /**
     * @param ExhibitionsRepository $exhibitionRepository
     * @param ExhibitionsManager $exhibitionsManager
     */
    public function __construct(ExhibitionsRepository $exhibitionRepository, ExhibitionsManager $exhibitionsManager)
    {
        $this->repository   = $exhibitionRepository;
        $this->manager      = $exhibitionsManager;
        $this->maxDate      = Carbon::today()->addYears(self::MAX_YEARS);
    }

    /**
     * @param $humanDate
     * @return mixed
     */
    public function index($humanDate = '')
    {
        // Search by title
        if ($humanDate === '' && Input::has('title')) {
            $exhibitions = $this->manager->findByTitleSinceToday(Input::get('title'));

            return View::make('exhibitions.frontend.exhibitions.index', compact('exhibitions'));
        }

        if ($humanDate !== '' && substr($humanDate, 0, 1) === '0') {
            App::abort(404);
        }

        try {
            $englishDate = $this->manager->convertMonthFromHumanToNumber($humanDate);
            $date = Carbon::createFromFormat(ExhibitionsManager::DATE_FORMAT, $englishDate);
            $date->startOfDay();
        } catch (InvalidArgumentException $e) {
            $date = Carbon::today();
        }

        $exhibitions = $this->repository->findByDate($date);
        $calendar = $this->manager->getCalendar($date);

        return View::make('exhibitions.frontend.exhibitions.index', compact('exhibitions', 'date', 'calendar'));
    }

    public function history()
    {
        if (empty(Input::all())) {
            return View::make('exhibitions.frontend.exhibitions.history');
        }

        $fields = [];
        $fieldsNames = ['title', 'director'];

        foreach ($fieldsNames as $name) {
            if (Input::has($name)) {
                $fields[$name] = Input::get($name);
            }
        }

        $fields = array_reduce($fieldsNames, function ($fields, $name) {
            if (Input::has($name)) {
                $fields[$name] = Input::get($name);
            }

            return $fields;
        }, []);

        if (empty($fields)) {
            return View::make('exhibitions.frontend.exhibitions.history');
        }

        $results = $this->repository->findBy($fields, Carbon::minValue(), $this->maxDate);

        return View::make('exhibitions.frontend.exhibitions.history')->with('results', $results);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $exhibition = $this->repository->find($id);

        return View::make('exhibitions.frontend.exhibitions.show', compact('exhibition'));
    }

    public function searchFilms()
    {
        $exhibitions = $this->manager->findByTitleSinceToday(Input::get('titlte', ''));

        $filmsNames = $this->manager->getFilmsTitles($exhibitions->getCollection());

        return JsonResponse::create($filmsNames->toArray());
    }
}
