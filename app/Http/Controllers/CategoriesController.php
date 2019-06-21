<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
        $attributes = $this->validateCategory();
        Category::create($attributes);

        return redirect('/categories');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $category->update($this->validateCategory());

        return redirect('/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }

    protected function validateCategory(){
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:8']
        ]);
    }
}
