@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage User</h5>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">All Users</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Role</h5>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-default">All Roles</a>
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create Role</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Category</h5>
                    <a href="{{ action('Admin\CategoriesController@index') }}" class="btn btn-default">All Categories</a>
                    <a href="{{ action('Admin\CategoriesController@create') }}" class="btn btn-primary">Create Category</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Post</h5>
                    <a href="{{ action('Admin\PostsController@index') }}" class="btn btn-default">All Post</a>
                    <a href="{{ action('Admin\PostsController@create') }}" class="btn btn-primary">Create Post</a>
                </div>
            </div>

        </div>
    </div>

@stop

