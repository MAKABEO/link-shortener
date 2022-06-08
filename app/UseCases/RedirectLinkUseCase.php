<?php


namespace App\UseCases;



use App\Repositories\Contract\LinksRepositoryInterface;
use App\UseCases\Contract\RedirectLinkUseCaseInterface;

class RedirectLinkUseCase implements RedirectLinkUseCaseInterface
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

    public function handler(string $data)
    {
        $link = $this->linksRepository->findByShortedURL($data);
        $link->access_count += 1;
        $link->save();
        return redirect($link->url);
    }
}
