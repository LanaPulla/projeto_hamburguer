<?php 

namespace App\Providers;

use App\Repositories\Infrastructure\Eloquent\BurgerRepository;
use App\Repositories\Infrastructure\Eloquent\BurgerRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class InjectionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BurgerRepositoryInterface::class, BurgerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Paginator::useBootstrap(); 
    }
}