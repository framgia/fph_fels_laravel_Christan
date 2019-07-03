<?php

namespace App\Http\Controllers;

use App\User;
use App\Relationship;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::whereId($id)->first();
        $relationship = Relationship::where('follower_id', auth()->id())->where('followed_id', $id)->first();

        return view('profile', compact('user', 'relationship'));
    }
}
