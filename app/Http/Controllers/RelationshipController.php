<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\Relationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelationshipController extends Controller
{
    public function store()
    {
        $attributes = $this->validateRelationship();
        Relationship::create($attributes);
        $user = User::whereId($attributes['followed_id'])->first();
        $relationship = Relationship::where($attributes)->first();
        (new Activity)->create([
            'user_id' => Auth::user()->id,
            'notifiable_id' => $relationship->id,
            'notifiable_type' => 'App\Relationship',
            'content' => ' followed '
        ]);

        return redirect('/profile/' . $attributes['followed_id'])->with('message', 'You have followed ' . $user->first_name);
    }

    public function destroy(Relationship $relationship)
    {
        $attributes = $this->validateRelationship();
        $relationship->delete();
        $user = User::whereId($attributes['followed_id'])->first();

        return redirect('/profile/' . $attributes['followed_id'])->with('message', 'You have unfollowed ' . $user->first_name );
    }

    protected function validateRelationship()
    {
        return request()->validate([
            'follower_id' => ['required'],
            'followed_id' => ['required']
        ]);
    }
}
