<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use App\Answer;
use App\Lesson;
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnswer;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        $answers = $user->getLearnedWords();

        return view('wordslearned', compact('answers', 'user'));
    }

    public function store(StoreAnswer $request)
    {
        
        $attributes = $request->validated();

        Answer::create([
            'choice_id' => $attributes['answer'],
            'lesson_id' => $attributes['lesson_id']
        ]);

        if ($attributes['completed'] == 1) {
            $quiz = Quiz::whereId($attributes['quiz_id'])->get()->first();

            $quiz->completed = 1;
            $quiz->result = $quiz->getResult($attributes['lesson_id']);
            $quiz->save();

            (new Activity)->create([
                'user_id' => Auth::user()->id,
                'notifiable_id' => $quiz->id,
                'notifiable_type' => 'App\Quiz',
                'content' => ' learned ' . $quiz->result . ' of ' . $quiz->lesson->category->words->count() . ' words in ' . $quiz->lesson->category->title
            ]);
        }

        return redirect($attributes['next_url']);
    }
}
