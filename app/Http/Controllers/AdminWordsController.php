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

        return redirect('/admin/categories/' . $category->id);
    }

    public function edit(Word $word)
    {
        $choices = $word->choices;

        return view('admin.word.edit', compact('word', 'choices'));
    }

    public function update(Word $word, StoreWord $request)
    {
        $attributes = $request->validated();
        $attributes['word_id'] = $word->id;
        $word->updateRecord($attributes);
        session()->flash('message', $word->text . ' has been updated.');

        return redirect('/admin/categories/' . $word->category->id);
    }

    public function destroy(Word $word)
    {
        $word->deleteRecord($word);
        $word->delete();
        session()->flash('message', $word->text . ' has been deleted.');

        return redirect('admin/categories/' . $word->category->id);
    }
}
