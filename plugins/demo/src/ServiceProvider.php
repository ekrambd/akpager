<?php

namespace Demo\Wokoya;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/demo/'),
        ], 'public');
        $this->loadViewsFrom(__DIR__.'/../views', 'demo');
        $this->loadRoutesFrom(__DIR__.'/route.php');

    }

    /**
     * Register the application services.
     */
    public function register()
    {

    }
}
