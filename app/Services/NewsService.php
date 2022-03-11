<?php

namespace App\Services;

use App\Models\News;

class NewsService
{
    public static function search($validated)
    {
        $query = News::query();

        if (isset($validated['search']) && $validated['search']) {
            $query->where('title', 'like', "%{$validated['search']}%")
                ->orWhere('source', 'like', "%{$validated['search']}%")
                ->orWhere('author', 'like', "%{$validated['search']}%");
        }
        if (isset($validated['from']) && $validated['from']) {
            $query->whereDate('published_at', '>=', $validated['from']);
        }

        if (isset($validated['to']) && $validated['to']) {
            $query->whereDate('published_at', '<=', $validated['to']);
        }

        return $query->latest('published_at')->paginate(10);


    }
}
