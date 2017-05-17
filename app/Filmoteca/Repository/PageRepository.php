<?php namespace Filmoteca\Repository;

use Filmoteca\Models\Page;

class PageRepository
{
    public function __construct(Page $page){

        $this->page = $page;
    }

    public function store(array $data){

        $page = $this->page->create($data);

        return $page;
    }

    public function update($id, array $data){

        $page = $this->page
            ->find($id)
            ->fill($data)
            ->save();

        return $page;
    }

    public function delete($id){

        $page = $this->page->findOrFail($id);

        $page->delete();

        return $page;
    }

    public function find($id){

        return $this->page->findOrFail($id);
    }

    public function findBySlug($slug){

        $page = $this->page
            ->where('slug', $slug)
            ->firstOrFail();

        return $page;
    }

    public function paginate($amount = 15){

       $pages = $this->page
           ->orderBy('id','desc')
           ->paginate($amount);

        return $pages;
    }
}
