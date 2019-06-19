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

    public function show()
    {

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

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    protected function validateCategory(){
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:8']
        ]);
    }
}
