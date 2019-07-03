@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @include('errors')
    </div>
    <div class="col-md-8">
        <div class="card mt-4">
            <div class="card-header">
                <b>Update Category</b>
            </div>
            <div class="card-body">
                <form action="/admin/categories/{{ $category->id }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ $category->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" required>{{ $category->description }}</textarea>
                    </div>
                    <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
