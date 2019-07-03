@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @include('errors')
        <div class="card mt-4">
            <div class="card-header">
                <b>New User</b>
            </div>
            <div class="card-body">
                <form action="/admin/users" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="E.g John" value="{{ old('first_name') }}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="E.g Doe" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E.g johndoe@gmail.com" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select class="form-control" id="role" name="role" required>
                                <option disabled selected>Select a Role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-success" type="submit">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
