@extends('layouts.main')

@section('title', 'Edit A Ticket')

@section('content')

    <div class="row">
        <div class="col">
            <div class="wrapper">
                <h1 class="text-center">Edit a Ticket</h1>
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

                {{ Form::model($ticket, ['route' => ['tickets.update', $ticket->slug]]) }}
                    @method('put')

                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', $ticket->title, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('content', 'Content') }}
                        {{ Form::textarea('content', $ticket->content, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group form-check">
                        {{ Form::checkbox('status', null, false, ['class' => 'form-check-input']) }}
                        {{ Form::label('status', 'Close this ticket?', ['class' => 'form-check-label']) }}
                    </div>

                    <a href="{{ route('tickets.show', $ticket->slug) }}" class="btn btn-secondary">Cancel</a>

                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                {{ Form::close() }}

                {{-- <form method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $ticket->title }}">
                    </div>

                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $ticket->content }}</textarea>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status">
                        <label class="form-check-label" for="exampleCheck1">Close this ticket?</label>
                    </div>

                    <a href="{{ route('tickets.show', $ticket->slug) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form> --}}
            </div>
        </div>
    </div>

@stop