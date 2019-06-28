@extends('layout')

@section('content')
<div class="row justify-content-center">
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
                        Learned 20 words
                    </div>
                    <div class="row justify-content-center mt-4 mb-4">
                        Learned 5 lessons
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
                                        @if($activity->notifiable_type === "App\Quiz")
                                            <a href="/categories/{{ $activity->notifiable->lesson->category->id }}">
                                                {{ $activity->notifiable->lesson->category->title }}
                                            </a>
                                        @elseif ($activity->notifiable_type ===  "App\Relationship")
                                            <a href="/profile/{{ $activity->notifiable->followed->id }}">
                                                {{ $activity->notifiable->followed->id == $user->id ? 'You' : $activity->notifiable->followed->first_name }}
                                            </a>
                                        @endif
                                    </p>
                                    <small class="muted">{{ Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</small>
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
