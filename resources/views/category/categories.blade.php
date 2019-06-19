@extends('layout')

@section('content')
<h1 class="title">Categories</h1>
<div class="card-deck">
    @foreach ($categories as $category)
        <div class="card">
            <div class="card-body">
            <h5 class="card-title"><b>{{ $category->title }}</b></h5>
                <p class="card-text">{{ str_limit($category->description, $limit=60, $end='...') }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
