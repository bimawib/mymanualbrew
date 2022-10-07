@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Profile</h1>
</div>

<div class="container d-flex justify-content-center">
@if(session()->has('success'))
<div class="alert alert-success col-lg-8 d-flex justify-content-center" role="alert">
{{ session('success') }}
</div>
@endif
</div>

@foreach($images as $image)

@if($image->profile_pictures != '')
<div class="container d-flex justify-content-end" style="border: 1px solid black; height:250px; width:250px; border-radius: 13px; background-image:url({{ $image->profile_pictures }}); background-position: center; background-size: cover; ">
@else
<div class="container d-flex justify-content-end" style="border: 1px solid black; height:250px; width:250px; border-radius: 13px; background-image:url({{ URL::asset('img/emptyprofile.png') }}); background-position: center; background-size: cover; ">
@endif
<a class="btn btn-primary mt-auto border-info" href="/dashboard/users/profile-picture/{{ $image->user_id }}" style="height: 40px; align-items: flex-end; margin-bottom: 7px; margin-right: -14px; border-radius: 20px;"><span data-feather="edit"></span></a>
</div>

@endforeach

@foreach($users as $user)

<div class="container d-flex justify-content-center mt-3">
<div class="card border-dark" style="width: 450px;">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <h5 class="card-title">
            Name :
        </h5>
        <p class="card-text fs-6">
            {{ $user->name }}
        </p>
      </li>
      <li class="list-group-item">
        <h5 class="card-title">
            Username :
        </h5>
        <p class="card-text fs-6">
            {{ $user->username }}
        </p>
      </li>
      <li class="list-group-item">
        <h5 class="card-title">
            Email :
        </h5>
        <p class="card-text fs-6">
            {{ $user->email }}
        </p>
      </li>
      <li class="list-group-item">
        <h5 class="card-title">
            About Me :
        </h5>
        <p class="card-text fs-6">
            {{ $user->about_me }}
        </p>
      </li>
    </ul>
</div>
</div>

<div class="container d-flex justify-content-center" style="margin-top: 13px">
<a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-primary border-info" style="text-decoration: none">
    <span>EDIT MY PROFILE</span>
</a>
</div>

@endforeach

@endsection