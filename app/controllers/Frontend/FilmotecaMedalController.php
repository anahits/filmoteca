<?php

namespace Filmoteca\Frontend\Controllers;

use Carbon\Carbon;
use Filmoteca\Models\FilmotecaMedal;
use Filmoteca\Repository\FilmotecaMedalsRepository;
use Filmoteca\Utils\FilmotecaConfig;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

/**
 * Class FilmotecaMedalController
 * @package Filmoteca\Frontend\Controllers
 */
class FilmotecaMedalController extends Controller
{
    const INTERVALS = 7;
    /**
     * @var FilmotecaMedalsRepository
     */
    private $repository;

    /**
     * FilmotecaMedalController constructor.
     * @param FilmotecaMedalsRepository $repository
     */
    public function __construct(FilmotecaMedalsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        if (\Input::has('term')) {
            return $this->search();
        }

        $winners = $this->repository->all();
        $minYear = Config::get('parameters.filmoteca-medals.minYear');
        $maxYear = Carbon::today()->year;
        $startMinYear = $maxYear - 3;
        $sliderConfig = [
            'filmotecaMedal' =>
            [
                'slider' => [
                    'minYear' => $minYear,
                    'maxYear' => $maxYear,
                    'step' => floor(($maxYear-$minYear)/self::INTERVALS),
                    'value' => [$startMinYear, $maxYear]
                ]
            ]
        ];

        $filmotecaConfig = new FilmotecaConfig();
        $filmotecaConfig->addConfig($sliderConfig);

        return View::make('frontend.filmoteca_medals.index', compact('winners', 'filmotecaConfig'));
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $winner = $this->repository->find($id);

        return View::make('frontend.filmoteca_medals.show', compact('winner'));
    }

    public function search()
    {
        $term = \Input::get('term', '');
        $winners = $this->repository->findByName($term);

        $results = $winners->map(function (FilmotecaMedal $item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'award_date' => $item->award_date->format('d m Y'),
                'url_image' => $item->image->url('thumbnail')
            ];
        });

        return \Response::json($results);
    }
}
