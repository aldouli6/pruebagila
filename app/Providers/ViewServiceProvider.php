<?php

namespace App\Providers;
use App\Models\Type;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['vehicles.fields'], function ($view) {
            $typeItems = Type::pluck('name','id')->toArray();
            $view->with('typeItems', $typeItems);
        });
        View::composer(['vehicles.fields', 'vehicles.table','vehicles.show_fields'], function ($view) {
            $typeItems = Type::pluck('name','id')->toArray();
            $view->with('typeItems', $typeItems);
        });
        //
    }
}