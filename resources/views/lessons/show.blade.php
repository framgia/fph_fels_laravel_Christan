@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Quiz
            </div>
            <div class="card-body">
                    {{ $lesson->category->title }}
                <small class="muted">This category has {{$lesson->category->words->count()}} words</small>
            </div>
        </div>
    </div>
</div>
@endsection
