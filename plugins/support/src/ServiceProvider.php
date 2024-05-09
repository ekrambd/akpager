<?php

namespace Wokoya\Support;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/support/'),
        ], 'public');
    }

    /**
     * Register the application services.
     */
    public function register()
    {

    }
}
