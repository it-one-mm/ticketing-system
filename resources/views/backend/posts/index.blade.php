
@extends('layouts.main')

@section('title', 'View All Posts')

@section('content')

    <div class="row">
        <div class="col">
            <h1>All Posts</h1>
            <hr>

            @if(session('secondary'))
                <div class="alert alert-secondary">
                    {{ session('secondary') }}
                </div>
            @endif

            <table class="table">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $posts as $post )
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <a href="{{ action('Admin\PostsController@edit', $post->id) }}">{{ $post->title }}</a>
                        </td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>


        </div>
    </div>

@stop
