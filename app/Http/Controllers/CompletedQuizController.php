<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class CompletedQuizController extends Controller
{
    public function store(Quiz $quiz)
    {
        $quiz->complete();

        return back();
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->incomplete();

        return back();
    }
}
