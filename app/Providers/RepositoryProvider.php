<?php

namespace App\Providers;

use App\Repositories\Contract\LinksRepositoryInterface;
use App\Repositories\LinksRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private $providers = [
        LinksRepositoryInterface::class => LinksRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->providers as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
