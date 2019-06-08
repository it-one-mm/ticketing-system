@extends('layouts.main')

@section('title', 'View All Roles')

@section('content')

    <div class="row">
        <div class="col">
            <h1>All Roles</h1>
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
                @foreach( $roles as $role )
                    <tr>
                        <td>{{ $role->name }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>


        </div>
    </div>

@stop
