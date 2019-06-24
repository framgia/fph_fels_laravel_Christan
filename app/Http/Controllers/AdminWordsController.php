<?php

namespace App\Http\Controllers;

use App\Word;
use App\Category;
use App\Http\Requests\StoreWord;

class AdminWordsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show(Word $word)
    {
        return view ('admin.word.show', compact('word'));
    }

    public function create(Category $category)
    {
        return view('admin.word.create', compact('category'));
    }

    public function store(Category $category, StoreWord $request)
    {
        $attributes = $request->validated();
        $attributes['category_id'] = $category->id;
        (new Word)->newRecord($attributes);
        session()->flash('message', $attributes['text'].' has been added to ' . $category->title);

        return redirect('/admin/categories');
    }

    public function edit(Word $word)
    {
        $choices = $word->choices;
        return view('admin.word.edit', compact('word', 'choices'));
    }

    public function update(Word $word)
    {
        $attributes = $this->validateEntry();
        $attributes['word_id'] = $word->id;
        $word->updateRecord($attributes);

        return redirect('/admin/categories');
    }

    protected function validateEntry(){
        return request()->validate([
            'text' => ['required'],
            'choice0' => ['required', 'min:3'],
            'choice1' => ['required', 'min:3'],
            'choice2' => ['required', 'min:3'],
            'choice3' => ['required', 'min:3'],
            'answer' => ['required'],
        ]);
    }
}
