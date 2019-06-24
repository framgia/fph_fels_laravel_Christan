<?php

namespace App\Http\Controllers;

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
        Lesson::create($attributes);

        return redirect('/lessons');
    }

    private function validateLesson()
    {
        return request()->validate([
            'category_id' => 'required'
        ]);
    }
}
