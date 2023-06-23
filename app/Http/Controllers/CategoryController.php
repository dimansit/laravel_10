<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = \DB::table('categories')->get();
        return view('news.categories',
            [
                'categories' => $categories
            ]
        );
    }
}
