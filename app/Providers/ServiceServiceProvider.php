<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LendeeServices;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('LendeeServices', function(){
            return new LendeeServices;
        });
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
