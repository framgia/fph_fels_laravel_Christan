<?php

namespace App;

use App\Choice;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['text', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function newRecord($attributes){
        $record = $this->create([
            'category_id' => $attributes['category_id'],
            'text' => $attributes['text'],
        ]);
        $attributes['word_id'] = $record->id;
        $attributes = collect($attributes)->forget('category_id')->forget('text');
        (new Choice)->newRecord($attributes);
    }
}
