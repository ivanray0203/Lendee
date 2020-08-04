<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Repository;
use App\Lendee;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Lendee', function() {
            return new Repository(new Lendee);
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
