<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $categories = Category::all();

        return view('admin.category.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function create(Category $category)
    {
        return view('admin.category.create');
    }

    public function store(StoreCategory $request)
    {
        $attributes = $request->validated();
        Category::create($attributes);
        session()->flash('message', $attributes['title'] . ' category has been created.');

        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(StoreCategory $request, Category $category)
    {
        $category->update($request->validated());

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories');
    }
}
