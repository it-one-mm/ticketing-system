@extends('layouts.main')

@section('title', 'View All Categories')

@section('content')

    <div class="row">
        <div class="col">
            <h1>All Categories</h1>
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
                @foreach( $categories as $category )
                    <tr>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>


        </div>
    </div>

@stop
