<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Answer;
use Illuminate\Http\Request;

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
