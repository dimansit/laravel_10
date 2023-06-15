<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function index()
    {

        return view('news.index',
            [
                'newsList'   => $this->getNews(),
                'categories' => $this->getCategories()
            ]
        );
    }

    public function show($newsId)
    {
        return view('news.show',
            [
                'news' => $this->getNews($newsId)
            ]
        );
    }

    public function category($categoryId)
    {
        return view('news.index',
            [
                'newsList' => $this->getNewsFromCategory($categoryId),
                'categories' => $this->getCategories()
            ]
        );
    }
}
