<?php

namespace App\Providers;

use App\UseCases\Contract\CreateShortedLinkUseCaseInterface;
use App\UseCases\Contract\Get100MostAccessUseCaseInterface;
use App\UseCases\Contract\GetLinkObjectUseCaseInterface;
use App\UseCases\Contract\RedirectLinkUseCaseInterface;
use App\UseCases\CreateShortedLinkUseCase;
use App\UseCases\Get100MostAccessUseCase;
use App\UseCases\GetLinkObjectUseCase;
use App\UseCases\RedirectLinkUseCase;
use Illuminate\Support\ServiceProvider;

class UseCaseProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private $providers = [
        CreateShortedLinkUseCaseInterface::class => CreateShortedLinkUseCase::class,
        Get100MostAccessUseCaseInterface::class => Get100MostAccessUseCase::class,
        GetLinkObjectUseCaseInterface::class => GetLinkObjectUseCase::class,
        RedirectLinkUseCaseInterface::class => RedirectLinkUseCase::class,
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
