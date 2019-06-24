@extends('layout')

@section('content')
<ul>
    @foreach ($lessons as $lesson)
    <li>
        {{ $lesson->category->title }}
    </li>
    @endforeach
</ul>
@endsection
