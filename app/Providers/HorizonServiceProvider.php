<?php

namespace App\Providers;

use Horizon;
use Illuminate\Support\ServiceProvider;

class HorizonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if (!app()->environment('local')) {
            \Laravel\Horizon\Horizon::auth(function ($request) {
                return app()->environment(config('support.stages'));
            });
        }
    }
}
