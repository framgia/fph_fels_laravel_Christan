<?php

namespace App;

use App\Lesson;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
