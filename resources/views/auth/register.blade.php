@extends('layouts.main')
@section('title', 'Register')

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-4">

      <h2 class="text-center">Register</h2>
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

      <form method="post">
        @csrf
        <div class="form-group">
          <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="email" name="email" value="{{ old('email') }}" class="form-control"
          placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" name="password" value="" class="form-control"
          placeholder="Password">
        </div>
        <div class="form-group">
          <input type="password" name="password_confirmation" value="" class="form-control"
          placeholder="Confirm Password">
        </div>
        <input type="submit" class="btn btn-block btn-primary" value="Register">
      </form>

    </div>
  </div>

@stop
