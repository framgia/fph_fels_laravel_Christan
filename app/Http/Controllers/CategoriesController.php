<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all()->map(function ($category){
            $lesson = $category->lessons->whereIn('user_id', auth()->id());
            if($category->words->count() && !$lesson->count()) {
                return $category;
            }
        })->filter();

        return view('category.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }
}
