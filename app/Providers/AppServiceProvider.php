<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app\smsvarification;

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
        //
    }
}
