

@extends('layouts.main')

{{-- extends relatif ke folder view --}}

@section('child-container')

@if($profilePicture->profile_pictures != '')
<div class="container d-flex mt-5 justify-content-center" style="border: 1px solid black; height:250px; width:250px; border-radius: 13px; background-image:url({{ $profilePicture->profile_pictures }}); background-position: center; background-size: cover; ">
@else
<div class="container d-flex mt-5 justify-content-center" style="border: 1px solid black; height:250px; width:250px; border-radius: 13px; background-image:url({{ URL::asset('img/emptyprofile.png') }}); background-position: center; background-size: cover; ">
@endif
</div>

<div class="container mt-3 mb-5 d-flex justify-content-center" style="max-width: 400px;">
<div class="card text-center" style="border: 1px solid black">
    <div class="card-body">
      <h5 class="card-title fs-3">{{ $user->name }}</h5>
      <h5 class="card-title fs-4">({{ '@'.$user->username }})</h5>
      <p class="card-text fs-5 fst-italic">"{{ $user->about_me }}"</p>
    </div>
  </div>
</div>

@endsection

