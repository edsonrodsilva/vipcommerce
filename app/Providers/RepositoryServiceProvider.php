<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind(
            'App\Interfaces\ClientInterface',
            'App\Repositories\ClientRepository'
        );

        $this->app->bind(
            'App\Interfaces\ProductInterface',
            'App\Repositories\ProductRepository'
        );

        $this->app->bind(
            'App\Interfaces\OrderInterface',
            'App\Repositories\OrderRepository'
        );

        $this->app->bind(
            'App\Interfaces\OrderEmailInterface',
            'App\Repositories\OrderEmailRepository'
        );

        $this->app->bind(
            'App\Interfaces\OrderReportInterface',
            'App\Repositories\OrderReportRepository'
        );
    }
}
