<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
Use Schema;

// use Illuminate\Contracts\Routing\UrlGenerator;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;


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
    // public function boot(UrlGenerator $url)
    public function boot()
    {
        Schema::defaultStringLength(191);

        // URL::forceScheme('https');

        // if(\App::environment('production')) {
        //     $url->forceScheme('https');
        // }

        if (Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
        {
           URL::forceScheme('https');
        }
    }
}
