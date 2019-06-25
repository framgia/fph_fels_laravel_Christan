<?php

namespace App;

use App\Lesson;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function deleteRecord()
    {
        $words = $this->words;
        foreach($words as $word) {
            $word->deleteRecord();
            $word->delete();
        }
    }
}
