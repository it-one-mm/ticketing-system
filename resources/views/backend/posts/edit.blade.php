@extends('layouts.main')

@section('title', 'Edit a Post')

@section('content')

    <div class="row">
        <div class="col">
            <div class="wrapper">
                <h1 class="text-center">Edit a Post</h1>
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

                <form method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label for="categories">Select Categories</label>
                    <select name="categories[]" id="categories" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content"
                              id="content"
                              cols="30"
                              rows="5"
                              class="form-control">{{ $post->content }}</textarea>
                </div>

                    <input type="submit" value="Update" class="btn btn-primary">

                </form>

            </div>
        </div>
    </div>

@stop
