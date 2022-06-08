<?php


namespace App\UseCases;


use App\Models\Link;
use App\Repositories\Contract\LinksRepositoryInterface;
use App\UseCases\Contract\Get100MostAccessUseCaseInterface;
use Illuminate\Support\Collection;

class Get100MostAccessUseCase implements Get100MostAccessUseCaseInterface
{
    /**
     * @var LinksRepositoryInterface
     */
    private $linksRepository;

    /**
     * CreateCategoryUseCase constructor.
     * @param LinksRepositoryInterface $linksRepository
     */
    public function __construct(LinksRepositoryInterface $linksRepository)
    {
        $this->linksRepository = $linksRepository;
    }

    /**
     * @return Collection
     */
    public function handler():Collection
    {
        return $this->linksRepository->get100MostAccessed();
    }
}
