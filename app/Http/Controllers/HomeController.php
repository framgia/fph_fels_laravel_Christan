<?php

namespace App\Http\Controllers;

use App\Relationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userActivities = $user->activities;
        $followedUsers = $user->following;
        
        if($followedUsers) {
            foreach($followedUsers as $record) {
                foreach ($record->followed->activities as $activity) {
                    $userActivities->push($activity);
                }
            }
        }

        return view('home', compact('user'));
    }
}
