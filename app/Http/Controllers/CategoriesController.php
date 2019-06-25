<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all()->map(function ($category){
            return $category->words->count() > 0 ? $category : null;
        })->filter();

        return view('category.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }
}
