<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\Relationship;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRelationship;

class RelationshipController extends Controller
{
    public function store(StoreRelationship $request)
    {
        $attributes = $request->validated();
        Relationship::create($attributes);
        $user = User::whereId($attributes['followed_id'])->first();
        $relationship = Relationship::where($attributes)->first();
        (new Activity)->create([
            'user_id' => Auth::user()->id,
            'notifiable_id' => $relationship->id,
            'notifiable_type' => 'App\Relationship',
            'content' => ' followed ' . $relationship->followed->first_name
        ]);

        return redirect('/profile/' . $attributes['followed_id'])->with('message', 'You have followed ' . $user->first_name);
    }

    public function destroy(Relationship $relationship, StoreRelationship $request)
    {
        $attributes = $request->validated();
        $relationship->delete();
        $user = User::whereId($attributes['followed_id'])->first();

        return redirect('/profile/' . $attributes['followed_id'])->with('message', 'You have unfollowed ' . $user->first_name );
    }
}
