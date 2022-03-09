<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCollection;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::when($request->search, function ($query, $search)
        {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('source', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
        })
        ->whereDate('published_at', '<=', $request->from_date)
        ->whereDate('published_at', '>=', $request->to_date)
        ->paginate(10);

        return new NewsCollection($news);
    }
}
