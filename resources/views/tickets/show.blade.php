@extends('layouts.main')

@section('title', 'Ticket')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card" style="margin: 16px 0;">
                <div class="card-body">
                    <h5 class="card-title">{{ $ticket->title }}</h5>
                    <p><strong>Status:</strong> {{ $ticket->status ? 'Opened' : 'Closed' }}</p>
                    <p class="card-text">{{ $ticket->content }}</p>
                    <a href="{{ route('admin.tickets.edit', $ticket->slug) }}" class="btn btn-primary">Edit</a>
                    <a 
                        href="#" 
                        onclick="event.preventDefault(); document.getElementById('delete-form').submit();" 
                        class="btn btn-danger">Delete</a>
                    <form id="delete-form" action="{{ route('admin.tickets.destroy', $ticket->slug) }}" method="post" style="display: none">
                        @csrf
                        @method('delete')
                    </form>
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

                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                        <input type="hidden" name="ticket_type" value="App\Ticket">

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