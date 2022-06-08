<?php


namespace App\UseCases\Contract;


interface CreateShortedLinkUseCaseInterface
{
    public function handler(string $data);
}
