@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        Admin Panel
        <ul class="float-right">
            <a href="/admin/categories/create">
                <button class="btn btn-sm btn-success">
                    Create New <i class="fas fa-plus-square"></i>
                </button>
            </a>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="col-lg-12">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <a href="/admin/categories/{{ $category->id }}">
                                {{ $category->title }}
                            </a>
                        </td>
                        <td>
                            {{ str_limit($category->description, $limit=30, $end='..') }}
                        </td>
                        <td>
                            <form method="POST" action="/admin/categories/{{ $category->id }}">
                                @csrf
                                @method('DELETE')
                                <a href="/admin/categories/{{ $category->id }}/words/create" class="btn btn-link">
                                    Add Word
                                </a>
                                |
                                <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-link">
                                    Edit
                                </a>
                                |
                                <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row float-right">
    <div class="col-lg-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
