@extends('layouts.main')

@section('title', 'Ticket')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin: 16px 0;">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>

            @foreach($comments as $comment)
                <div class="card" style="margin: 16px 0;">
                    <div class="card-body">
                        {{ $comment->content }}
                    </div>
                </div>
            @endforeach

            <div class="card">
                <h5 class="card-header">Reply</h5>
                <div class="card-body">
                    <form method="post" action="{{ action('CommentsController@newComment') }}">
                        @csrf
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        @endif

                        <input type="hidden" name="ticket_id" value="{{ $post->id }}">
                        <input type="hidden" name="ticket_type" value="App\Post">

                        <div class="form-group">
                            <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@stop
