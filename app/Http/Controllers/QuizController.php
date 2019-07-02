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
        if($quiz->completed === 1) {
            return redirect('/lessons');
        } else {
            $words = Word::where('category_id', $quiz->lesson->category_id)->paginate(1);

            return view('quiz.quiz', compact('words', 'quiz'));
        }
    }
}
