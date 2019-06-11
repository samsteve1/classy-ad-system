<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \App\Area::creating(function ($area) {
            $prefix = $area->parent ? $area->parent->name . ' ' : '';
            $area->slug = str_slug($prefix . $area->name);
        });
        \App\Category::creating(function ($category) {
            $prefix = $category->parent ? $category->parent->name . ' ' : '';
            $category->slug = str_slug($prefix . $category->name);
        });
    }
}
