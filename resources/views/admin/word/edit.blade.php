@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <b>Edit Word</b>
            </div>
            <div class="card-body">
                <form action="/admin/words/{{ $word->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="text">Word</label>
                                <input type="text" name="text" id="text" class="form-control" placeholder="E.g 人" required value="{{ $word->text }}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="choice">Choice</label>
                            @foreach ($choices as $key => $choice)
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="answer" value="{{ $choice->text }}" {{ $choice->is_correct == 1 ? "checked" : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" name="choice{{ $key }}" id="choice{{ $key }}" class="form-control {{ $choice->is_correct == 1 ? "is-valid" : "" }}" value="{{ $choice->text }}">
                                    @if ($choice->is_correct == 1)
                                        <div class="valid-feedback">
                                            This is the correct answer.
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Edit Word</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        @include('errors')
    </div>
</div>
@endsection
