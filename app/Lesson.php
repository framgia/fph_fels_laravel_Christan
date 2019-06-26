<?php

namespace App;

use App\Quiz;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['category_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function createLesson($attributes)
    {
        $record = $this->create([
            'category_id' => $attributes['category_id'],
            'user_id' => $attributes['user_id']
        ]);
        $quiz = new Quiz;
        $quiz->createQuiz($record->id);

        return $record;
    }
}
