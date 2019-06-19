@extends('layout')

@section('content')
<h1 class="title">Categories</h1>
<ul>
    @foreach ($categories as $category)
        <li>{{ $category->title }}</li>
    @endforeach
</ul>
@endsection
