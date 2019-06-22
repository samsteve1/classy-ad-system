<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposer\{AreaComposer, NavigationComposer};

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AreaComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AreaComposer::class);
        View::composer('layouts.partials._navigation', NavigationComposer::class);
        View::composer(['listings.partials.forms._areas'], function($view) {
            $areas = \App\Area::get()->toTree();
            $view->with(compact('areas'));
        });

        View::composer(['listings.partials.forms._categories'], function($view) {
            $categories = \App\Category::get()->toTree();
            $view->with(compact('categories'));
        });
    }
}
