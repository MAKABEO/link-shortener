<?php


namespace App\UseCases;


use App\Models\Link;
use App\Repositories\Contract\LinksRepositoryInterface;
use App\UseCases\Contract\CreateShortedLinkUseCaseInterface;
use Illuminate\Support\Str;

class CreateShortedLinkUseCase implements CreateShortedLinkUseCaseInterface
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
     * @param string $data
     * @return link
     */
    public function handler(string $data):Link
    {
        $linkData = [
          'title' => '',
          'url' => $data,
          'shorted_url' => 'link'.Str::random(10),
          'access_count' => 0,
        ];
        return $this->linksRepository->create($linkData);
    }
}
