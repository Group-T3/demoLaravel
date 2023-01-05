<?php

namespace App\Providers;

use App\Repositories\Implement\CartRepository;
use App\Repositories\Implement\CategoryRepository;
use App\Repositories\Implement\ProductRepository;
use App\Repositories\Implement\RoleRepository;
use App\Repositories\Implement\UserRepository;
use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterfaces;
use App\Repositories\Interfaces\ProductRepositoryInterfaces;
use App\Repositories\Interfaces\RoleRepositoryInterfaces;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
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
        $this->app->singleton(
            UserRepositoryInterfaces::class,
            UserRepository::class
        );
        $this->app->singleton(
            RoleRepositoryInterfaces::class,
            RoleRepository::class
        );
        $this->app->singleton(
            CartRepositoryInterface::class,
            CartRepository::class
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
