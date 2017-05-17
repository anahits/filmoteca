<?php namespace Api;

use Filmoteca\Repository\IconographicsRepository;
use Input;
use Response;

class IconographicController extends ApiController
{
	public function __construct(IconographicsRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function all()
	{
		$resources = $this->repository->all();

		return Response::json($resources,200);
	}

	/**
	 * TODO: refactor. Use inherence.
	 * @return [type] [description]
	 */
	public function store()
	{
		$data = Input::except('_token'); /* Getting Only Some Of The Request Input */

		$resource = $this->repository->store($data);

		$icon = $this->repository->find($resource->id);

		return Response::json($icon,200);
	}

    public function destroy($id)
    {
        $icon = $this->repository->destroy($id);

        return Response::json($icon);
    }

    public function update($id)
    {
        $data = [
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'since' => Input::get('since'),
            'until' => Input::get('until')
        ];

        if( Input::hasFile('image')) {
            $data['image'] = Input::file('image');
        }

        $icon = $this->repository->update($id, $data);

        return Response::json($icon);
    }
}