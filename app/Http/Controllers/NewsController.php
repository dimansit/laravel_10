<?php

namespace App\Http\Controllers;

use App\Queries\NewsQueryBuilder;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return view('news.index',
            [
                'newsList' => $newsQueryBuilder->getActiveNews()
            ]
        );
    }

    public function show($newsId)
    {
        $news = \DB::table('news')->find($newsId);
        return view('news.show',
            [
                'news' => $news
            ]
        );
    }

    public function category($categoryId)
    {
        $news = \DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.category as category')
            ->where('category_id', '=', $categoryId)
            ->get();
        return view('news.index',
            [
                'newsList' => $news
            ]
        );
    }
}
