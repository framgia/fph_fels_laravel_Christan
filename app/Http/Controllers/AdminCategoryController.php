<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

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

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $category->update($this->validateCategory());

        return redirect('/admin/categories');
    }

    public function destroy()
    {
    }

    protected function validateCategory(){
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:8']
        ]);
    }
}
