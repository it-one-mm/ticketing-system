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
                    <a href="{{ route('tickets.edit', $ticket->slug) }}" class="btn btn-primary">Edit</a>
                    <a 
                        href="#" 
                        onclick="event.preventDefault(); document.getElementById('delete-form').submit();" 
                        class="btn btn-danger">Delete</a>
                    <form id="delete-form" action="{{ route('tickets.destroy', $ticket->slug) }}" method="post" style="display: none">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop