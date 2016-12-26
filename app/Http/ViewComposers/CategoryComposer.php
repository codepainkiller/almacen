<?php

namespace App\Http\ViewComposers;



use App\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::orderBy('id')->get();
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}