<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Job\JobRepository;
use App\Repositories\Job\JobRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
    
        $this->app->bind(
            \App\Repositories\Job\JobRepositoryInterface::class,
            \App\Repositories\Job\JobRepository::class
        );
    
        $this->app->bind(
            \App\Repositories\Application\ApplicationRepositoryInterface::class,
            \App\Repositories\Application\ApplicationRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
