<?php

namespace App\Providers;

use App\Services\ProductCategoryService;
use Illuminate\Support\ServiceProvider;

class ProductCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductCategoryService::class);
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
