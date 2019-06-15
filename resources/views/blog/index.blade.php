
@extends('layouts.main')

@section('title', 'View All Posts')

@section('content')

    <div class="row">
        <div class="col">
            <h1>All Posts</h1>
            <hr>

            @if($posts->isEmpty())
                There is no Posts
            @else
                @foreach($posts as $post)
                <div class="card" style="margin: 16px 0;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ action('BlogController@show', $post->slug) }}">{{ $post->title }}</a>
                        </h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 100, ' (...)') }}</p>
                        <a href="#" class="btn btn-link">read more</a>
                    </div>
                </div>
                @endforeach
            @endif



        </div>
    </div>

@stop

