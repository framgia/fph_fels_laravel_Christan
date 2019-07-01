<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ['word_id', 'text', 'is_correct'];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function newRecord($attributes)
    {
        $choices = [
            $attributes['choice1'],
            $attributes['choice2'],
            $attributes['choice3'],
            $attributes['choice4'],
        ];
        foreach ($choices as $key => $choice) {
            if ($key === $attributes['answer']) {
                $this->create([
                    'word_id' => $attributes['word_id'],
                    'text' => $choice,
                    'is_correct' => 1
                ]);
            } else {
                $this->create([
                    'word_id' => $attributes['word_id'],
                    'text' => $choice,
                ]);
            }
        }
    }
}
