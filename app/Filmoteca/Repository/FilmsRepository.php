<?php namespace Filmoteca\Repository;

use Filmoteca\Models\Film;
use Filmoteca\Pagination\Results;
use Exception;
use InvalidArgumentException;

class FilmsRepository extends ResourcesRepository implements PageableRepositoryInterface
{
    /**
     * @param Film $film
     */
    public function __construct(Film $film)
    {
        $this->resource = $film;
    }

    /**
     * @param array $data
     * @return Film
     * @throws Exception
     */
    public function store(array $data = null)
    {
        if (empty($data)) {
            throw new Exception('Empty data');
        }

        if (isset($data['countries'])) {
            $countries_ids = $data['countries'];
            unset($data['countries']);
        }

        $film = $this->resource->create($data);

        if (isset($countries_ids) && is_array($countries_ids)) {
            $film->countries()->sync($countries_ids);
        }

        return $film;
    }

    /**
     * @param int $id
     * @param array $data
     * @return Film
     * @throws InvalidArgumentException
     * @throw Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update($id, array $data = null)
    {
        if (empty($data)) {
            throw new InvalidArgumentException('Empty data');
        }

        if (isset($data['genre_id']) && intval($data['genre_id']) === 0) {
            unset($data['genre_id']);
        }

        $film = $this->resource->findOrFail($id);
        $film->fill($data)->save();
        $film->countries()->detach();

        if (isset($data['countries']) && is_array($data['countries'])) {
            $film->countries()->sync($data['countries']);
        }

        return $film;
    }

    /**
     * @param int $id
     * @return Film
     * @throw Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function destroy($id)
    {
        $film = $this->resource->findOrFail($id);

        $film->delete();

        return $film;
    }

    /**
     * Realiza una búsqueda de una película.
     * @param  String $by
     * @param  String | Array $data Valor que se desea buscar.
     * @param  Array $options (Opcional)
     * @return Collection | Eloquent
     * @throws Exception
     */
    public function search($by, $data, $options = [])
    {
        $limit = 8;

        switch ($by) {
            case ('title'):
                return $this->resource->where($by, 'like', '%' . $data . '%')->take($limit)->get();

            default:
                throw new Exception("The type of search there is not.");
        }
    }

    /**
     * @param int $page
     * @param string $query
     * @param int $itemsPerPage
     * @return \Filmoteca\Pagination\Results
     */
    public function paginate($page = 1, $query = '', $itemsPerPage = 15)
    {
        $results = Results::make();

        $films = $this->resource
            ->where('title', 'like', '%' . $query . '%')
            ->whereOr('original_title', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'DESC')
            ->skip(($page - 1) * $itemsPerPage)
            ->take($itemsPerPage)
            ->get();

        $totalFilms = $this->resource
            ->where('title', 'like', '%' . $query . '%')
            ->whereOr('original_title', 'like', '%' . $query . '%')
            ->count();

        $results->setItems($films);
        $results->setTotal($totalFilms);

        return $results;
    }
}
