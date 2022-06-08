<?php


namespace App\Repositories\Contract;


use App\Models\Link;
use Illuminate\Support\Collection;

interface LinksRepositoryInterface
{
    /**
     * @param int $id
     * @return Link
     */
    public function find(int $id): Link;

    /**
     * @param string $link
     */
    public function findByShortedURL(string $link);

    /**
     * @return Collection
     */
    public function get100MostAccessed():Collection;

    /**
     * @param array $data
     * @return Link
     */
    public function create(array $data): Link;
}
