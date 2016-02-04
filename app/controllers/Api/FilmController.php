<?php

namespace Api;

use Filmoteca\Repository\PageableRepositoryInterface;
use Filmoteca\Services\FilmService;
use Filmoteca\Transformers\FilmTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\Factory as Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Translation\Translator;

/**
 * Class FilmController
 * @package Api
 */
class FilmController extends ApiController
{
    /**
     * @var FilmService
     */
    protected $filmService;

    /**
     * @var Paginator
     */
    protected $paginator;

    /**
     * @var FilmTransformer
     */
    protected $transformer;

    /**
     * @var Translator
     */
    protected $translator;

    /**
     * @param FilmService $filmService
     * @param Paginator $paginator
     * @param FilmTransformer $transformer
     * @param Translator $translator
     */
    public function __construct(
        FilmService $filmService,
        Paginator $paginator,
        FilmTransformer $transformer,
        Translator $translator
    ) {
        $this->filmService  = $filmService;
        $this->paginator    = $paginator;
        $this->transformer  = $transformer;
        $this->lang         = $translator;
    }

    /**
     * @return \Illuminate\Pagination\Paginator
     */
    public function index()
    {
        $page       = Input::has('page') ? Input::get('page') : PageableRepositoryInterface::FIRST_PAGE;
        $query      = Input::has('query') ? Input::get('query') : '';
        $results    = $this->filmService->paginate($page, $query);

        $transformedItems = $this->transformer->transformCollection($results->getItems());

        $results->setItems($transformedItems);

        return $this->paginator->make(
            $results->getItems()->toArray(),
            $results->getTotal(),
            PageableRepositoryInterface::ITEMS_PER_PAGE
        );
    }

    /**
     * @return \Filmoteca\Models\Film
     */
    public function store()
    {
        $film = $this->filmService->storeFilm(Input::all());

        return $film;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $film = $this->filmService->findFilm($id);
        } catch (ModelNotFoundException $e) {
            return Response::json([
                'message' => $this->lang->get('api.films.not-found')
            ], 404);
        }

        $transformedFilm = $this->transformer->transform($film, true);

        return $transformedFilm;
    }

    /**
     * @param int $id
     * @return \Filmoteca\Models\Film
     */
    public function destroy($id)
    {
        try {
            $destroyedFilm = $this->filmService->destroyFilm($id);
        } catch (ModelNotFoundException $e) {
            return Response::json([
                'message' => $this->lang->get('api.films.actions.delete.not-found')
            ], 404);
        }

        return $destroyedFilm;
    }

    /**
     * @param $id
     * @return \Filmoteca\Models\Film
     */
    public function update($id)
    {
        $data = Input::all();
        $data['years'] = Input::get('years', '');

        $updatedFilm = $this->filmService->updateFilm($id, $data);

        return $updatedFilm;
    }
}
