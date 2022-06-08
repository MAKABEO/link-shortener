<?php


namespace App\Repositories;


use App\Models\Link;
use App\Repositories\Contract\LinksRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class LinksRepository implements LinksRepositoryInterface
{

    /**
     * @var Link
     */
    private $model;

    /**
     * LinksRepository constructor.
     * @param Link $model
     */
    public function __construct(Link $model)
    {
        $this->model = $model;
    }

    public function find(int $id): Link
    {
        if (null == $model = $this->model->find($id)) {
            throw new ModelNotFoundException("Link no encontrado con id: $id");
        }

        return $model;
    }

    public function get100MostAccessed(): Collection
    {
        return DB::table('links')->limit(100)->orderByDesc('access_count')->get();
    }

    public function create(array $data): Link
    {
        return $this->model->create($data);
    }

    public function findByShortedURL(string $link)
    {
        if (null == $model = $this->model->where('shorted_url','=',$link)->first()) {
            throw new ModelNotFoundException("Link no encontrado con string: $link");
        }

        return $model;
    }
}
