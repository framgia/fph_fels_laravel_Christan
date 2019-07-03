<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Answer;
use App\Lesson;
use App\Http\Requests\StoreLesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lessons = Auth::user()->lessons;

        return view('lessons.lessons', compact('lessons'));
    }

    public function store(StoreLesson $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->id();
        if(Lesson::where($attributes)->get()->count()) {
            return redirect('/home')->with('message', 'You have already taken this lesson!');
        } else {
            $lesson = new Lesson;
            $lesson->createLesson($attributes);
            $quiz = Lesson::where($attributes)->first();

            return redirect('/quiz/' . $quiz->id);
        }
    }

    public function show($id)
    {
        $lesson = Lesson::where('id', $id)->first();
        $answers = Answer::whereLessonId($id)->get();
        $quiz = Quiz::where('lesson_id', $id)->first();

        return view('lessons.show', compact('lesson', 'answers', 'quiz'));
    }
}
