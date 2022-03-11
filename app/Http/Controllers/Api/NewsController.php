<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Services\NewsService;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Http\Resources\NewsIndexCollection;
use App\Http\Requests\NewsIndexRequest;

class NewsController extends Controller
{
    public function index(NewsIndexRequest $request)
    {
        $news = NewsService::search($request->validated());
        return new NewsIndexCollection($news);
    }

    public function show(News $news)
    {
        return new NewsResource($news);
    }
}
