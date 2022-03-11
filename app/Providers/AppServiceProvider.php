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
                'x-api-key' => env('NEWS_API_KEY'),
            ])->baseUrl('https://newsapi.org/v2/');
        });

    }
}
