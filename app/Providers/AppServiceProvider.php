<?php

namespace App\Providers;

use App\Helper\Pattern\Adapter\Item_2;
use App\Helper\Pattern\Adapter\Item_2_Interface;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        $this->app->singleton(Item_2_Interface::class , function (){
            return new Item_2();
        });
    }
}
