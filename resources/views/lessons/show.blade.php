@extends('layout')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-lg-6 text-center">
        <h1>You have finished {{ $lesson->category->title }}!</h1>
    </div>
</div>
<div class="row justify-content-center mt-4">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header">
                {{$lesson->category->title}}

                <span class="float-right">Score: {{ $quiz->result }} of {{ $lesson->category->words->count() }}</span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Result</th>
                        <th>Word</th>
                        <th>Answer</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answer)
                        <tr>
                            <td>

                                <i class="{{$answer->choice->is_correct == 1 ? 'far fa-circle' : 'fas fa-times'}}">{{$answer->choice->is_correct == 1 ? ' Correct' : ' Wrong'}}</i>
                            </td>
                            <td>
                                {{ $answer->choice->word->text }}
                            </td>
                            <td>
                                {{ $answer->choice->text }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-4">
    <a href="/categories">
        <button class="btn btn-lg btn-primary shadow">You think you can do more? Try other Categories!</button>
    </a>
</div>
@endsection
