<?php

namespace App;

use App\Answer;
use App\Lesson;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['lesson_id'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function completed()
    {
        $this->completed = '1';
    }

    public function activity()
    {
        return $this->morphTo('App\Activity', 'notifiable');
    }

    public function createQuiz($id)
    {
        $this->create([
            'lesson_id' => $id
        ]);
    }

    public function getResult($id)
    {
        $answers = Answer::whereLessonId($id)->get();
        $score = 0;
        foreach ($answers as $answer) {
            if($answer->choice->is_correct == 1) {
                $score++;
            }
        }
        return $score;
    }
}
