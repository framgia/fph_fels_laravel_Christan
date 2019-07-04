@extends('layout')

@section('content')
<h1 class="title">Meet new People!</h1>
<div class="card-deck mt-4">
    @foreach ($users as $user)
        @if ($user->id !== auth()->user()->id)
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/avatar/{{ $user->avatar }}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <a href="/profile/{{ $user->id }}">
                            <h5 class="card-title"><b>{{ $user->first_name }}</b></h5>
                        </a>
                        <p>
                            Following: {{ $user->following->count() }} |
                            Followers: {{ $user->followers->count() }}
                        </p>
                        <form action="/relationship/{{ $user->getRelationship(auth()->user()) != null ? $user->getRelationship(auth()->user())->id : '' }}" method="POST">
                            @csrf
                            @method($user->getRelationship(auth()->user()) != null ? "DELETE" : "POST")
                            <input type="hidden" name="follower_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="followed_id" value="{{ $user->id}} ">
                            <div class="row justify-content-center mt-4">
                                <div class="col">
                                    <button class="btn btn-{{ $user->getRelationship(auth()->user()) ? 'outline-primary' : 'primary' }} float-right" type="submit">
                                        {{ $user->getRelationship(auth()->user()) ? 'Unfollow' : 'Follow' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection
