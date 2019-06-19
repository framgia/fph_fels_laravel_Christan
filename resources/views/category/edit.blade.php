@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <b>Update Category</b>
            </div>
            <div class="card-body">
                <form action="/categories/{{ $category->id }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="title">Category Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ $category->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
