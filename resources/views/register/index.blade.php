@extends('layouts.main')

@section('child-container')

<main class="form-registration">
    <form action="/register" method="POST" name="form">
        @csrf
        <div class="text-center">
            <img class="justify-content-center" src="{{ URL::asset('img/to-footer.jpg') }}" alt="kopi" width="300" height="200" style="border-radius: 10px; margin: 3px auto">
        </div>
        
        <h1 class="h3 mt-3 mb-3 text-center">Register!</h1>

        <div class="form-floating">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email" value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        

        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        

        <button class="w-100 mb-1 btn btn-lg btn-primary" type="submit" value="Submit">Register!</button>
    </form>
    <small class="d-block text-center mt-3">Have an account? <a href="/login">Login Here!</a></small>
</main>

@endsection