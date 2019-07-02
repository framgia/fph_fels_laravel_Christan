<?php

namespace App;

use App\Lesson;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['lesson_id'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function createQuiz($id)
    {
        $this->create([
            'lesson_id' => $id
        ]);
    }
}
