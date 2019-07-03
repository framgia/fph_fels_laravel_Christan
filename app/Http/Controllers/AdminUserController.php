<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Hash;

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

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUser $request)
    {
        $attributes = $request->validated();
        $attributes['role'] = $attributes['role'] === "1" ? true : false;
        $user = (new User)->createUser($attributes);

        return redirect('/admin/users')->with('message', 'User '. $user->email . ' has been created');
    }
}
