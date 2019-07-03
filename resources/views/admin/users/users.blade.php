@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        Admin Panel | Users
        <ul class="float-right">
            <a href="/admin/users/create">
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
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-mail</th>
                    <th>User Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->first_name }}
                        </td>
                        <td>
                            {{ $user->last_name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @if($user->is_admin)
                                Admin
                            @else
                                User
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="/admin/users">
                                @csrf
                                @method('DELETE')
                                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-link">
                                    Edit
                                </a>
                                |
                                <button class="btn btn-link" type="submit" onclick="return confirm('Are you sure?')">
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
@endsection
