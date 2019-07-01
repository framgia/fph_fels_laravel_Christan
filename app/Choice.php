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
            $attributes['choice0'],
            $attributes['choice1'],
            $attributes['choice2'],
            $attributes['choice3'],
        ];
        foreach ($choices as $key => $choice) {
            if ($key == $attributes['answer']) {
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

    public function updateRecord($attributes)
    {
        $choices = [
            $attributes['choice0'],
            $attributes['choice1'],
            $attributes['choice2'],
            $attributes['choice3'],
        ];
        $records = Choice::whereWordId($attributes['word_id'])->get();
        foreach($records as $key => $record) {
            if($record->text === $attributes['answer']) {
                $record->update([
                    'text' => $choices[$key],
                    'is_correct' => 1
                ]);
            } else {
                $record->update([
                    'text' => $choices[$key],
                    'is_correct' => 0
                ]);
            }
        }
    }
}
