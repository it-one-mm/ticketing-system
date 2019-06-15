@extends('layouts.main')

@section('title', 'Create Category')

@section('content')

    <div class="row">
        <div class="col">
            <div class="wrapper">
                <h1 class="text-center">Create Category</h1>
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

                {{ Form::open() }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                {{ Form::close() }}

            </div>
        </div>
    </div>

@stop
