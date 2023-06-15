<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {

        return view('news.categories',
            [
                'categories' => $this->getCategories()
            ]
        );
    }
}
