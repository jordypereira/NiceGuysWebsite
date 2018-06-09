<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Page;

class NavbarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
          $pages = Page::all()->sortBy('order');
          $view->pages = $pages;
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
