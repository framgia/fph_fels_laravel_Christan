@extends('layout')

@section('content')
@if($lessons->count())
<h1 class="title">Lessons Taken</h1>
<div class="card-deck">
    @foreach ($lessons as $lesson)
    <div class="card shadow">
        <div class="card-body">
            <a href="/lessons/{{ $lesson->id }}">
                <h5>
                    {{ $lesson->category->title }}
                </h5>
            </a>
            <p class="card-text">Score: {{ $lesson->quiz->result }} out of {{ $lesson->category->words->count() }}</p>
            <small>Taken: {{ Carbon\Carbon::parse($lesson->created_at)->diffForHumans() }}</small>
        </div>
    </div>
    @endforeach
</div>
@else
    <h1 class="title"><b>Oops!</b></h1>
    <h3>You haven't taken any lessons yet!</h3>
    <small>Come back when you've finished at least 1 lesson. :)</small>
@endif
@endsection
