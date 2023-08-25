<?php

namespace App\Providers;

use App\View\Composers\CatComposer;
use App\View\Composers\CountryComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\View::composer('layouts.nav', CatComposer::class);
        \Illuminate\Support\Facades\View::composer('layouts.nav', CountryComposer::class);
    }
}
