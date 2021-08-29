<?php

namespace App\Providers;

use App\Helper\Pattern\Adapter\Item_2;
use App\Helper\Pattern\Adapter\Item_2_Interface;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
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
        VerifyEmail::toMailUsing(function ($nov , $url){
            return (new MailMessage())->subject('تاییده ایمیل')->view('mail.verify' , compact('url'));
        });
    }
}
