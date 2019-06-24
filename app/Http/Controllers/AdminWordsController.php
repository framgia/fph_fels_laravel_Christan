<?php

namespace App\Http\Controllers;

use App\Word;
use App\Category;
use App\Http\Requests\StoreWord;

class AdminWordsController extends Controller
{
    public function create(Category $category)
    {
        return view('admin.word.create', compact('category'));
    }

    public function store(Category $category, StoreWord $request)
    {
        $attributes = $request->validated();
        $attributes['category_id'] = $category->id;
        (new Word)->newRecord($attributes);
        session()->flash('message', $attributes['text'].' has been added to ' . $category->title);

        return redirect('/admin/categories');
    }
}
