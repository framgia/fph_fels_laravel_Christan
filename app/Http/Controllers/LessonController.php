<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Answer;
use App\Lesson;
use Illuminate\Http\Request;
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

    public function store()
    {
        $attributes = $this->validateLesson();
        $attributes['user_id'] = auth()->id();
        $lesson = new Lesson;
        $lesson->createLesson($attributes);
        $quiz = Lesson::where($attributes)->first();

        return redirect('/quiz/' . $quiz->id);
    }

    public function show($id)
    {
        $lesson = Lesson::where('id', $id)->first();
        $answers = Answer::whereLessonId($id)->get();
        $quiz = Quiz::where('lesson_id', $id)->first();

        return view('lessons.show', compact('lesson', 'answers', 'quiz'));
    }

    private function validateLesson()
    {
        return request()->validate([
            'category_id' => 'required'
        ]);
    }
}
