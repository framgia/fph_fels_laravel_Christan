@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                {{ $quiz->lesson->category->title }}
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($words as $word)
                        <div class="col-md-4">
                            <div class="row justify-content-center">
                                <h1 class="title">
                                    {{ $word->text }}
                                </h1>
                            </div>
                        </div>
                        <div class="col-md-8">
                            @foreach ($word->choices as $key => $choice)
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="answer" value="{{ $choice->id }}">
                                        </div>
                                    </div>
                                    <input type="text" name="choice{{ $key }}" id="choice{{ $key }}" class="form-control" value="{{ $choice->text }}" readonly>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <a href="{{ $words->nextPageUrl() }}">
            <button class="btn btn-primary">Next</button>
        </a>
    </div>
</div>
@endsection
