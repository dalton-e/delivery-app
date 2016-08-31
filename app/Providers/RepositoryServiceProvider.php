<?php

namespace DeliveryApp\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('DeliveryApp\Repositories\CategoryRepository', 'DeliveryApp\Repositories\CategoryRepositoryEloquent');
        $this->app->bind('DeliveryApp\Repositories\ProductRepository', 'DeliveryApp\Repositories\ProductRepositoryEloquent');
        $this->app->bind('DeliveryApp\Repositories\ClientRepository', 'DeliveryApp\Repositories\ClientRepositoryEloquent');
    }
}
