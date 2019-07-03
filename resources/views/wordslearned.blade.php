@extends('layout')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header">
                Words Learned
            </div>
            <div class="card-body">
                @if ($answers->count() > 0)
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Category</th>
                                <th>Word</th>
                                <th>Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($answers as $answer)
                            <tr>
                                <td>
                                    {{ $answer->lesson->category->title }}
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
                @else
                <p>
                    {{ $user->id === auth()->user()->id ? 'You have' : $user->first_name . ' has' }} not learned any words and/or taken any lessons yet.
                </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
