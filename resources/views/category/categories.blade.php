@extends('layout')

@section('content')
<h1 class="title">Categories</h1>
<div class="card-deck">
    @foreach ($categories as $category)
        <div class="card">
            <div class="card-body">
                <a href="/categories/{{ $category->id }}">
                    <h5 class="card-title"><b>{{ $category->title }}</b></h5>
                </a>
                <p class="card-text">{{ str_limit($category->description, $limit=60, $end='...') }}</p>
                <a href="#" class="btn btn-outline-primary float-right">Start Lesson</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
