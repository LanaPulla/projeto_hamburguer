<?php

namespace App\Providers;

use App\Repositories\Infrastructure\Eloquent\BurgerRepository;
use App\Repositories\Infrastructure\Eloquent\BurgerRepositoryInterface;
use App\Repositories\Infrastructure\Eloquent\OptionalRepository;
use App\Repositories\Infrastructure\Eloquent\OptionalRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BurgerRepositoryInterface::class, BurgerRepository::class);
        $this->app->bind(OptionalRepositoryInterface::class, OptionalRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
