<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\AnalyticsService;
use App\Services\Interfaces\InterfaceAnalyticsService;
use App\Services\Interfaces\InterfaceUserService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(BaseRepository::class, RoleRepository::class);
        $this->app->bind(BaseRepository::class, UserRepository::class);
        $this->app->bind(InterfaceUserService::class, UserService::class);
        $this->app->bind(InterfaceAnalyticsService::class, AnalyticsService::class);
    }
}
