<?php

namespace App;

use App\Choice;
use App\Lesson;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['choice_id', 'lesson_id'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }
}
