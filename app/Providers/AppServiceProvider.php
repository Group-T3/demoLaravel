<?php

namespace App\Providers;

use App\Service\Implement\CategoryService;
use App\Service\Implement\ProductService;
use App\Service\Interfaces\CategoryServiceInterfaces;
use App\Service\Interfaces\ProductServiceInterfaces;
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
