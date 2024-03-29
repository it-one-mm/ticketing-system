@extends('layouts.main')

@section('title', 'View All Tickets')

@section('content')

    <div class="row">
        <div class="col">
            <h1>All Tickets</h1>
            <hr>

            @if(session('secondary'))
                <div class="alert alert-secondary">
                    {{ session('secondary') }}
                </div>
            @endif
            
            <table class="table">

                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Slug</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $tickets as $ticket )
                        <tr>
                            <td><a href="{{ route('admin.tickets.show', [$ticket->slug]) }}">{{ $ticket->title }}</a></td>
                            <td>{{ $ticket->content }}</td>
                            <td>{{ $ticket->slug }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>


        </div>
    </div>

@stop