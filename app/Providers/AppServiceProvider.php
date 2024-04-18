<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\Sendemailvarificationotp;
use App\Events\Sendphonevarificationotp;
use App\Listeners\Otpsendtomailvarification;
use App\Listeners\Otpsendtophonevarification;
use Illuminate\Support\Facades\Event;
use App\smsvarification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(smsvarification::class, function ($app) {
            return new smsvarification();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            Sendemailvarificationotp::class,
            Otpsendtomailvarification::class
        );

        Event::listen(
            Sendphonevarificationotp::class,
            Otpsendtophonevarification::class
           
        );
    }
}
