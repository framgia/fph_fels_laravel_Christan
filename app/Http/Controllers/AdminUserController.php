<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUser;

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

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, UpdateUser $request)
    {
        $attributes = $request->validated();
        $attributes['is_admin'] = $attributes['role'] === "1" ? true : false;
        $user->updateUser($attributes);

        return redirect('/admin/users')->with('message', 'User ' . $attributes['email'] . ' has been updated');
    }

    public function destroy(User $user)
    {
        $findUser = User::find($user->id);
        \Session::getHandler()->destroy($findUser->session_id);

        $user->delete();

        return redirect('/admin/users');
    }
}
