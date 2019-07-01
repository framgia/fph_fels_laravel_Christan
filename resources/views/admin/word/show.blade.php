@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="text">Word</label>
                            <input type="text" name="text" id="text" class="form-control" placeholder="E.g 人" required value="{{ $word->text }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Choices</label>
                            <div class="input-group">
                                <input type="text" name="choice1" id="choice1" class="form-control {{ $word->choices[0]->is_correct === 1 ? "is-valid" : '' }}" value="{{ $word->choices[0]->text }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="choice2" id="choice2" class="form-control {{ $word->choices[1]->is_correct === 1 ? "is-valid" : '' }}" value="{{ $word->choices[1]->text }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="choice3" id="choice3" class="form-control {{ $word->choices[2]->is_correct === 1 ? "is-valid" : '' }}" value="{{ $word->choices[2]->text }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="choice4" id="choice4" class="form-control {{ $word->choices[3]->is_correct === 1 ? "is-valid" : '' }}" value="{{ $word->choices[3]->text }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
