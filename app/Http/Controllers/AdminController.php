<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function categories(){
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }
}
