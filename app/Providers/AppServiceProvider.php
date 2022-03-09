<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
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

        /**
         * News Api v2
         * the macro proviced easy access to the api
         * x-api-key is the Api Key
         */
        Http::macro('newsapiV2', function () {
            return Http::withHeaders([
                'x-api-key' => '9055c7cb898f45b983fe45abe134b5f9',
            ])->baseUrl('https://newsapi.org/v2/');
        });

    }
}
