<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\View\View;

class CategoryController extends Controller
{

    protected QueryBuilder $categoriesQueryBuilder;

    public function __construct(
        CategoriesQueryBuilder $categoriesQueryBuilder,
    )
    {
        $this->categoriesQueryBuilder = $categoriesQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.categories.categories',
            [
                'categories' => $this->categoriesQueryBuilder->getAll()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {

        $category = new Category();
        $category->fill($request->validated());
        if ($category->save()) {
            echo json_encode([
                'err'  => 0,
                'msg'  => 'category add ok',
                'data' => $category
            ]);
        } else {
            echo json_encode([
                'err' => 1,
                'msg' => 'category not add'
            ]);
        }
        exit;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, Category $category)
    {
        $category = $category->fill(
            $request->validated()
        );
        if ($category->save()) {
            return \redirect()
                ->route('admin.categories.index')
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
        if (Category::destroy($id)) {
            echo json_encode(['err' => 0]);
        } else {
            echo json_encode(['err' => 1]);
        }
        exit;
    }
}
