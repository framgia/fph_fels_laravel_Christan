@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <h1 class="title">Home</h1>
    </div>
    <div class="col-lg-12">
        @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <img src="/avatar/{{ $user->avatar }}" class="img-fluid">
                    <div class="row justify-content-center mt-4 mb-4">
                        <h2 class="title">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </h2>
                    </div>
                    <div class="row justify-content-center mt-4 mb-4">
                        <a href="/answer/{{ $user->id }}">
                            Learned {{ $user->getLearnedWords()->count() }} words
                        </a>
                    </div>
                    <div class="row justify-content-center mt-4 mb-4">
                        <a href="/lessons">
                            Learned {{ $user->lessons->count() }} lesson(s)
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="container mt-4">
                        <h2 style="title">Activities</h2>
                    </div>
                    <ul class="list-unstyled">
                        @foreach ($user->activities->sortByDesc('created_at')->take(5) as $activity)
                        <li class="media mt-4">
                            <img src="/avatar/{{ $user->avatar }}" width="75" class="mr-3 img-fluid" alt="...">
                            <div class="media-body">
                                <p>
                                    <a href="/profile/{{ $activity->user->id }}">
                                        {{ $activity->user->id == $user->id ? 'You' : $activity->user->first_name }}
                                    </a>
                                    {{ $activity->content }}
                                </p>
                                <small
                                    class="muted">{{ Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</small>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
