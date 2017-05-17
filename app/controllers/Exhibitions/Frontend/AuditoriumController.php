<?php

namespace Filmoteca\Exhibitions\Controllers\Frontend;

use Filmoteca\Repository\AuditoriumsRepository;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

/**
 * Class AuditoriumController
 */
class AuditoriumController extends Controller
{
    /**
     * @var AuditoriumsRepository
     */
    protected $auditoriumRepository;

    /**
     * @param AuditoriumsRepository $auditoriumRepository
     */
    public function __construct(AuditoriumsRepository $auditoriumRepository)
    {
        $this->auditoriumRepository = $auditoriumRepository;
    }

    /**
     * @param string $slug
     */
    public function show($slug)
    {
        $auditorium = $this->auditoriumRepository->findBySlug($slug);

        $data = [
            'auditorium' => $auditorium,
            'side' => 'left'
        ];

        return View::make('exhibitions.frontend.auditoriums.show', $data);
    }

    public function index()
    {
        $auditoriums = $this->auditoriumRepository->all();

        return View::make('exhibitions.frontend.auditoriums.index', compact('auditoriums'));
    }
}
