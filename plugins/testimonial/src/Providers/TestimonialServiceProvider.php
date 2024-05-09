<?php

namespace Plugins\Testimonial\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class TestimonialServiceProvider extends BaseServiceProvider
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
            __DIR__.'/../../assets' => public_path('vendor/testimonial/'),
        ], 'public');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'testimonial');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'testimonial');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {

    }
}
