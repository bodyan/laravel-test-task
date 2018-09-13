<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BrowserComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeBrowser();
    }

    public function composeBrowser()
    {
        view()->composer('layouts.partials._navigation', 'App\Http\Composers\BrowserComposer');
    }
}
