<?php

namespace App\Providers;

use App\Repositories\Implement\CategoryRepository;
use App\Repositories\Implement\ProductRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterfaces;
use App\Repositories\Interfaces\ProductRepositoryInterfaces;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            ProductRepositoryInterfaces::class,
            ProductRepository::class
        );
        $this->app->singleton(
            CategoryRepositoryInterfaces::class,
            CategoryRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
