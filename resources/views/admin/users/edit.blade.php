@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @include('errors')
        <div class="card mt-4">
            <div class="card-header">
                <b>Edit</b>
            </div>
            <div class="card-body">
                <form action="/admin/users/{{ $user->id }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="E.g Doe" value="{{ $user->last_name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E.g johndoe@gmail.com" value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select class="form-control" id="role" name="role" required>
                                <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $user->is_admin == 1 ? 'selected' : ''}}>Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank if you want password unchanged.">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-success" type="submit">Edit User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
