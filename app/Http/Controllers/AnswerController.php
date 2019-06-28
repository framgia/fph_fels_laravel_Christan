<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Answer;
use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store()
    {
        $attributes = $this->validateAnswer();
        Answer::create([
            'choice_id' => $attributes['answer'],
            'lesson_id' => $attributes['lesson_id']
        ]);
        if($attributes['completed'] == 1) {
            $quiz = Quiz::whereId($attributes['quiz_id'])->get()->first();
            $quiz->completed = 1;
            $quiz->result = $quiz->getResult($attributes['lesson_id']);
            $quiz->save();
            (new Activity)->create([
                'user_id' => Auth::user()->id,
                'notifiable_id' => $quiz->id,
                'notifiable_type' => 'App\Quiz',
                'content' => ' learned ' . $quiz->result . ' of ' . $quiz->lesson->category->words->count() . ' words in '
            ]);
        }

        return redirect($attributes['next_url']);
    }

    protected function validateAnswer()
    {
        return request()->validate([
            'answer' => ['required'],
            'lesson_id' => ['required'],
            'next_url' => ['required'],
            'completed' => ['required'],
            'quiz_id' => ['required']
        ]);
    }
}
