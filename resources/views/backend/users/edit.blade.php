@extends('layouts.main')

@section('title', 'Edit Users')

@section('content')

    <div class="row">
        <div class="col">
            <h1>Edit a User</h1>
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif

            <form method="post">
                @csrf
                <div class="form-group">
                    <input type="text"
                           name="name" class="form-control" placeholder="User Name"
                            value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <input type="email"
                           name="email" class="form-control" placeholder="Email"
                            value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <select name="role[]" class="form-control" multiple>
                        <option value="">--Please Select Role--</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" @if(in_array($role->name, $selectedRoles)) selected @endif>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="password"
                           name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password"
                           name="password_confirmation" class="form-control" placeholder="Confirm Password">
                </div>

                <input type="submit" class="btn btn-primary" value="Update User">
            </form>


        </div>
    </div>

@stop

