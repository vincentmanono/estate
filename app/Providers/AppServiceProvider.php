<?php

namespace App\Providers;

use App\Observers\UnitObserver;
use App\Unit;
use Illuminate\Support\ServiceProvider;

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
        Unit::observe(UnitObserver::class) ;
    }
}
