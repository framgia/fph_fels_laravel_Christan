<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = ['follower_id', 'followed_id'];

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id', 'id');
    }

    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_id', 'id');
    }

    public function activity()
    {
        return $this->morphTo('App\Activity', 'notifiable');
    }
}
