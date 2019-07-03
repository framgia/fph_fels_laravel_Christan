@extends('layout')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>Add Word</b>
                </div>
                <div class="card-body">
                    <form action="/admin/categories/{{ $category->id }}/words" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="text">Word</label>
                                    <input type="text" name="text" id="text" class="form-control" placeholder="E.g 人" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="choice0">Choices</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="answer" value="0" required>
                                            </div>
                                        </div>
                                        <input type="text" name="choice0" id="choice0" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" value="1">
                                                </div>
                                            </div>
                                            <input type="text" name="choice1" id="choice1" class="form-control" required>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="answer" value="2">
                                            </div>
                                        </div>
                                        <input type="text" name="choice2" id="choice2" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <input type="radio" name="answer" value="3">
                                            </div>
                                        </div>
                                        <input type="text" name="choice3" id="choice3" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success float-right">Add Word</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('errors')
        </div>
    </div>
@endsection
