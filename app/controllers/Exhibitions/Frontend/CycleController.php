<?php

namespace Filmoteca\Exhibitions\Controllers\Frontend;

use Carbon\Carbon;
use Filmoteca\Repository\CyclesRepository;
use Filmoteca\Repository\ExhibitionsRepository;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class CycleController extends Controller
{

    /**
     * @var \Filmoteca\Repository\CyclesRepository
     */
    protected $cyclesRepository;

    /**
     * @var ExhibitionsRepository
     */
    protected $exhibitionsRepository;

    /**
     * CycleController constructor.
     * @param CyclesRepository $cyclesRepository
     * @param ExhibitionsRepository $exhibitionsRepository
     */
    public function __construct(CyclesRepository $cyclesRepository, ExhibitionsRepository $exhibitionsRepository)
    {
        $this->cyclesRepository = $cyclesRepository;
        $this->exhibitionsRepository = $exhibitionsRepository;
    }

    public function index()
    {
        $cycles = $this->cyclesRepository->findSinceToday();

        return View::make('exhibitions.frontend.cycles.index', compact('cycles'));
    }

    /**
     * @param string $slug
     */
    public function show($slug)
    {
        $cycle = $this->cyclesRepository->findBySlug($slug);
        $exhibitions = $this->exhibitionsRepository->findByCycle($cycle, Carbon::today(), Carbon::today()->addMonth(2));

        if ($cycle === null) {
            App::abort(404);
        }

        return View::make('exhibitions.frontend.cycles.show', compact('cycle', 'exhibitions'));
    }
}
