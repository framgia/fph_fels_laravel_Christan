<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Word;
use App\Category;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
    }

    public function show(Quiz $quiz)
    {
        $words = Word::where('category_id', $quiz->lesson->category_id)->simplePaginate(1);
        $words->withPath($quiz->lesson->category->title . '/quiz');

        return view('quiz.quiz', compact($words));
    }
}
