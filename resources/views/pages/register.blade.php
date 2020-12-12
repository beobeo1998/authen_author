@extends('layout.master')

@section('content')
    <div class="col-sm-6">
        <h1>Register</h1>
        <form method="POST" action="{{ route('post.register') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="name" placeholder="Enter name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
              @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
