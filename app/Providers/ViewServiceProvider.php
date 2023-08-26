<?php

namespace App\Providers;

use App\View\Composers\CatComposer;
use App\View\Composers\CountryComposer;
use App\View\Composers\PhimSapChieuComposer;
use App\View\Composers\TopPhimBoComposer;
use App\View\Composers\TopPhimLeComposer;
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
        \Illuminate\Support\Facades\View::composer(['layouts.nav', 'errors.404'], CatComposer::class);
        \Illuminate\Support\Facades\View::composer(['layouts.nav', 'errors.404'], CountryComposer::class);
        \Illuminate\Support\Facades\View::composer(['layouts.sidebar', 'home', 'view'], TopPhimBoComposer::class);
        \Illuminate\Support\Facades\View::composer(['layouts.sidebar', 'home', 'view'], TopPhimLeComposer::class);
        \Illuminate\Support\Facades\View::composer(['layouts.sidebar', 'view'], PhimSapChieuComposer::class);
    }
}
