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

        return view('admin.categories', compact('categories'));
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

    public function edit()
    {

    }

    public function update()
    {

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
