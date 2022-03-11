<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TopHeadlineRepository
{

    /**
     * Imports news from News Api website
     *
     * @param [Array] $validated : expects validated data
     * @return void
     */
    public function create(Array $validated)
    {
        /**
         * App\ProvidersAppServiceProvider
         * created a macro to fetch data from news api v2
         */
        $headlines = Http::newsapiV2()->get('/top-headlines?everything', [
            'country' => $validated['country'],
            'category' => $validated['category'],
            'language' => 'en',
            'sortBy' => 'publishedAt'
        ]);

        if ($headlines->failed()) {
            return [
                'status' => 'error',
                'message' =>  $headlines['message']
            ];
        }

        /**
         * creating an array before insert to the table.
         * the data array changes some of the feild names to fit with the table
         * 1. urlToImage
         * 2. publishedAt
         */
        $data = collect($headlines['articles'])->map(fn ($article) => [
            'source' => $article['source']['name'],
            'title' => $article['title'],
            'author' => Str::limit($article['author'], 250) ,
            'description' => $article['description'],
            'url' => $article['url'],
            'url_to_image' => $article['urlToImage'],
            'published_at' => Carbon::parse($article['publishedAt'])->toDateTimeString(),
            'user_id' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),

        ])->values()->all();


        /**
         * Json data might have errors that priventing the inssert
         * therefour uses Transaction
         */
        DB::beginTransaction();
        try {
            News::insert($data);
            DB::commit();

            return $this->outputMessage('success', count($data) . ' articles has been imported successfully !');


        } catch (\Exception $exception) {
            DB::rollback();

            return $this->outputMessage('error', 'Exception !. '. $exception->getMessage());

        } catch (\Error $error) {
            DB::rollback();
            return $this->outputMessage('error', 'Error !. '. $error->getMessage());

        }
    }

    /**
     * the function return status and message to controller
     *
     * @param String $status => error, success
     * @param String $message
     * @return Array
     */
    protected function outputMessage(String $status, String $message) :Array
    {
        return [
            'status' => $status,
            'message' => $message
        ];
    }
}
