<?php

namespace Filmoteca\Services;

use Filmoteca\Repository\FilmsRepository;
use Filmoteca\Transformers\FilmTransformer;
use Filmoteca\Repository\PageableRepositoryInterface;

class FilmService
{
    /**
     * @param FilmsRepository $repository
     * @param FilmTransformer $transformer
     */
    public function __construct(FilmsRepository $repository, FilmTransformer $transformer)
    {
        $this->repository   = $repository;
        $this->transformer  = $transformer;
    }

    /**
     * @param int $page
     * @param string $query
     * @param int $itemsPerPage
     * @return \Filmoteca\Pagination\Results
     */
    public function paginate(
        $page = PageableRepositoryInterface::FIRST_PAGE,
        $query = '',
        $itemsPerPage = PageableRepositoryInterface::ITEMS_PER_PAGE
    ) {
        $results = $this->repository->paginate($page, $query, $itemsPerPage);

        return $results;
    }

    /**
     * @param $id
     * @return Filmoteca\Models\Exhibitions\Film
     */
    public function findFilm($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $data
     * @return Filmoteca\Models\Exhibitions\Film
     */
    public function storeFilm(array $data)
    {
        return $this->repository->store($data);
    }

    /**
     * @param int $id
     * @return Filmoteca\Models\Exhibitions\Film
     */
    public function destroyFilm($id)
    {
        $destroyedFilm = $this->repository->destroy($id);

        return $destroyedFilm;
    }

    /**
     * @param int $id
     * @param array $data
     * @return Filmoteca\Models\Exhibitions\Film
     */
    public function updateFilm($id, array $data)
    {
        $updatedFilm = $this->repository->update($id, $data);

        return $updatedFilm;
    }
}
