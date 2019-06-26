<?php

namespace App\Http\Controllers;

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

        return redirect($attributes['next_url']);
    }

    protected function validateAnswer()
    {
        return request()->validate([
            'answer' => ['required'],
            'lesson_id' => ['required'],
            'next_url' => ['required']
        ]);
    }
}
