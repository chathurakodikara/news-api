<?php

namespace App\Http\Controllers\Web;

use App\Services\CountryService;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;

use App\Repositories\TopHeadlineRepository;
use App\Http\Requests\TopHeadlineCreateRequest;

class TopHeadlineController extends Controller
{
    public function index()
    {

        $categories = CategoryService::all();
        $countries = CountryService::all();

        return view('headline.index', compact('categories', 'countries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TopHeadlineCreateRequest $request
     * @param NewsRepository $newsRepository
     * @return void
     */
    public function store(TopHeadlineCreateRequest $request, TopHeadlineRepository $topHeadlineRepository)
    {

        $news = $topHeadlineRepository->create($request->validated());

        if ($news['status'] == 'error') {
            return redirect()->back()->with($news['status'], $news['message']);
        }

        return redirect()->route('news.index')->with($news['status'], $news['message']);

    }
}
