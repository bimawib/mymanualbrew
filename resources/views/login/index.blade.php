@extends('layouts.main')

@section('child-container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 0px auto">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 0px auto">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<main class="form-signin">
    <form action="/login" method="post">
        @csrf
        <div class="text-center">
            <img class="justify-content-center" src="{{ URL::asset('img/to-footer.jpg') }}" alt="kopi" width="300" height="200" style="border-radius: 10px; margin: 3px auto">
        </div>
        <h1 class="h3 mt-3 mb-3 text-center">Login</h1>

        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email@example.com" autofocus required value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <button class="w-100 mb-1 btn btn-lg btn-primary" type="submit" value="Submit">Login!</button>
    </form>
    <small class="d-block text-center">Not Registered? <a href="/register" style="text-decoration: none">Register here!</a></small>
</main>

@endsection