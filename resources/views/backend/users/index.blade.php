@extends('layouts.main')

@section('title', 'View All Users')

@section('content')

    <div class="row">
        <div class="col">
            <h1>All Users</h1>
            <hr>

            @if(session('secondary'))
                <div class="alert alert-secondary">
                    {{ session('secondary') }}
                </div>
            @endif

            <table class="table">

                <thead>
                <tr>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                    <tr>
                        <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>


        </div>
    </div>

@stop

