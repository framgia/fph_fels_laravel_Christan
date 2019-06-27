@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                {{ $quiz->lesson->category->title }}
                <span class="float-right">
                    {{ $words->currentPage() }} of  {{ $words->lastPage() }}
                </span>
            </div>
            <div class="card-body">
                @foreach ($words as $word)
                    <form action="/answer/" method="POST">
                        @csrf
                        <div class="row">
                            @if ($words->currentPage() == $words->lastPage())
                                <input type="hidden" name="next_url" value="/lessons/{{$quiz->lesson->id}}">
                                <input type="hidden" name="completed" value="1">
                            @else
                                <input type="hidden" name="next_url" value="{{ $words->nextPageUrl() }}">
                                <input type="hidden" name="completed" value="0">
                            @endif
                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                            <input type="hidden" name="lesson_id" value="{{ $quiz->lesson->id }}">
                            <div class="col-lg-4">
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
                                                    <input type="radio" name="answer" value="{{ $choice->id }}" required>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $choice->text }}" readonly>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-primary float-right" type="submit">Next</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
