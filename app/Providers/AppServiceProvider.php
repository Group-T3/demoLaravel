<?php

namespace App\Providers;

use App\Service\Implement\CartService;
use App\Service\Implement\CategoryService;
use App\Service\Implement\ProductService;
use App\Service\Implement\RoleService;
use App\Service\Implement\UserService;
use App\Service\Interfaces\CartServiceInterface;
use App\Service\Interfaces\CategoryServiceInterfaces;
use App\Service\Interfaces\ProductServiceInterfaces;
use App\Service\Interfaces\RoleServiceInterfaces;
use App\Service\Interfaces\UserServiceInterfaces;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ProductServiceInterfaces::class,
            ProductService::class);
        $this->app->singleton(
            CategoryServiceInterfaces::class,
            CategoryService::class);
        $this->app->singleton(
            UserServiceInterfaces::class,
            UserService::class);
        $this->app->singleton(
            RoleServiceInterfaces::class,
            RoleService::class);
        $this->app->singleton(
            CartServiceInterface::class,
            CartService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
