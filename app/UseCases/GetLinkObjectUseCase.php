<?php


namespace App\UseCases;


use App\Models\Link;
use App\Repositories\Contract\LinksRepositoryInterface;
use App\UseCases\Contract\GetLinkObjectUseCaseInterface;

class GetLinkObjectUseCase implements GetLinkObjectUseCaseInterface
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
     * @param int $data
     * @return link
     */
    public function handler(int $data):Link
    {
        return $this->linksRepository->find($data);
    }
}
