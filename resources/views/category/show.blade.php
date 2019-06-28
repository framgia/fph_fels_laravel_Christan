@extends('layout')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3> {{ $category->title }}</h3>
                    <small class="muted">Number of words: 10</small>
                    <p class="mt-3">
                        {{ $category->description }}
                    </p>
                    <form method="POST" action="/lessons/">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <button class="btn btn-outline-primary float-right">Start Lesson</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
