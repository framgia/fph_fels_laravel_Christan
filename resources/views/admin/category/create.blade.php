@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @include('errors')
        <div class="card mt-4">
            <div class="card-header">
                <b>New Category</b>
            </div>
            <div class="card-body">
                <form action="/admin/categories" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Category Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="E.g Science" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                            placeholder="Anything about Science!" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
