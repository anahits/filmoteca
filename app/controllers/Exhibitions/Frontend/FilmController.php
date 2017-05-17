<?php

namespace Filmoteca\Exhibitions\Controllers\Frontend;

use Carbon\Carbon;
use Filmoteca\Repository\FilmsRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

/**
 * Class ExhibitionController
 */
class FilmController extends Controller
{
    /**
     * @var FilmsRepository
     */
    protected $filmRepository;

    /**
     * ExhibitionController constructor.
     * @param FilmsRepository $filmsRepository
     */
    public function __construct(FilmsRepository $filmsRepository)
    {
        $this->filmRepository = $filmsRepository;
    }

    /**
     * @param $slug
     */
    public function show($slug)
    {
        $film = $this->filmRepository->findOneBySlug($slug);
        
        return View::make('exhibitions.frontend.films.show', compact('film'));
    }
}
