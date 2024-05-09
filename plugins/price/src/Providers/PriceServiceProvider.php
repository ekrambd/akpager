<?php

namespace Plugins\Price\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class PriceServiceProvider extends BaseServiceProvider
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
            __DIR__.'/../../assets' => public_path('vendor/price/'),
        ], 'public');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'price');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'price');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {

    }
}
