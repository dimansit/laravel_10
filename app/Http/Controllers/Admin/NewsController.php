<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\Store;
use App\Http\Requests\News\Update;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\View\View;

class NewsController extends Controller
{

    protected QueryBuilder $categoriesQueryBuilder;
    protected QueryBuilder $newsQueryBuilder;

    public function __construct(
        CategoriesQueryBuilder $categoriesQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder
    )
    {
        $this->categoriesQueryBuilder = $categoriesQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        return view('admin.news.news',
            [
                'newsList' => $this->newsQueryBuilder->getAll()
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.news.create', [
            'news'       => null,
            'categories' => $this->categoriesQueryBuilder->getAll(),
            'status'     => NewsStatus::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request): \Illuminate\Http\RedirectResponse
    {
        $news = News::create($request->validated());
        if ($news->save()) {
            return \redirect()
                ->route('admin.news.index')
                ->with('success', 'Новость создана');
        }
        return \back()->with('error', 'Новость не соаздана!');
    }




    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //return view('admin.news.create', [
        //    'news'       => $news,
        //    'categories' => $this->categoriesQueryBuilder->getAll(),
        //]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news): View
    {
        return view('admin.news.create', [
            'news'       => $news,
            'categories' => $this->categoriesQueryBuilder->getAll(),
            'status'     => NewsStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, News $news)
    {
        $news = $news->fill(
            $request->validated()
        );
        if ($news->save()) {
            return \redirect()
                ->route('admin.news.index')
                ->with('success', 'News has been update');
        }
        return \back()->with('error', 'News not been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
