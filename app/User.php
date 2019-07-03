<?php

namespace App;

use App\Lesson;
use App\Activity;
use App\Relationship;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',  'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function followers()
    {
        return $this->hasMany(Relationship::class, 'followed_id','id');
    }

    public function following()
    {
        return $this->hasMany(Relationship::class, 'follower_id', 'id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function getLearnedWords()
    {
        $answers = collect();
        foreach($this->lessons as $lesson) {
            foreach($lesson->answers as $answer) {
                if($answer->choice->is_correct == 1) {
                    $answers->push($answer);
                }
            }
        }
        return $answers;
    }

    public function createUser($attributes)
    {
        $this->fill([
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'email' => $attributes['email'],
            'is_admin' => $attributes['role'],
            'password' => Hash::make($attributes['password']),
        ]);

        $this->save();

        return $this;
    }

    public function updateUser($attributes)
    {
        $this->fill([
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'email' => $attributes['email'],
            'is_admin' => $attributes['is_admin'],
        ]);
        $this->updatePasswordIfNotEmpty($attributes['password']);
        $this->save();
    }

    protected function updatePasswordIfNotEmpty($password)
    {
        if(!empty($password)) {
            return $this->password = Hash::make($password);
        }
    }
}
