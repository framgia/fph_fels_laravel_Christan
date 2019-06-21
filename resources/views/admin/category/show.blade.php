@extends('layout')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3> {{ $category->title }}</h3>
                    <p class="mt-3">
                        {{ $category->description }}
                    </p>
                    @if ($category->words->count())
                    <ul>
                        @foreach ($category->words as $word)
                            <li>
                                {{ $word->text }}
                            </li>
                        @endforeach
                    </ul>
                    @else
                        This category has no words yet.
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
