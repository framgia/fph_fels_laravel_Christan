<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users.users', compact('users'));
    }
}
