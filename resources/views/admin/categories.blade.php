@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        Admin Panel
        <ul class="float-right">
            <a href="create.php">
                <button class="btn btn-sm btn-success">
                    Create New <i class="fas fa-plus-square"></i>
                </button>
            </a>
        </ul>
    </div>
</div>
<div class="row">
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
                            {{ str_limit($category->description, $limit=30, $end='...') }}
                        </td>
                        <td>
                            <a href="">
                                Add Word
                            </a>
                            |
                            <a href="">
                                Edit
                            </a>
                            |
                            <a href="">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
