@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h3> {{ $category->title }}</h3>
                <p class="mt-3">
                    {{ $category->description }}
                </p>
                <a href="/admin/categories/{{ $category->id }}/words/create">
                    <button class="btn btn-sm btn-success mb-4">
                        Add Word <i class="fas fa-plus-square"></i>
                    </button>
                </a>
                @if ($category->words->count())
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Word</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->words as $word)
                                <tr>
                                    <td>
                                        <a href="/admin/words/{{ $word->id }}">{{ $word->text }}</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="/admin/words/{{ $word->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="/admin/words/{{ $word->id }}/edit" class="btn btn-link">
                                                Edit
                                            </a>
                                            |
                                            <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <p>
                    This category has no words yet.
                </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
